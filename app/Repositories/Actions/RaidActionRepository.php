<?php namespace App\Repositories\Actions;

use App\Models\Group;
use App\Models\Character;

class RaidActionRepository
{


    public function enact($group_id, $characters)
    {

        // TODO Add a sprinkling of random chance

        // SETUP

        // Get defenders
        $defending_group = Group::with(['characters'])->findOrFail($group_id);
        $defenders = $defending_group->characters;

        // Get raiders
        $raiders = Character::findOrFail($characters);

        // INFILTRATION - find the total number of enemy characters that are alerted




        foreach ($raiders as $raider) {
            foreach ($defenders as $defender) {
                $this->alertCheck($raider, $defender) ;
            }
        }


        $alerted = 0;
        foreach ($defenders as $defender) {
            if($defender->alerted) {
                $alerted++;
            }
        }

        // TODO Affect the weighting based on number of raiders i.e, it gets easier to wake defenders the more raiders are in group.
        // TODO Perhaps affect weighting based on time of day. i.e easier at night


        /*
        example 1

        3x raiders
        3 + 5 + 7 = 15 DEX
        4x defenders
        2 + 0 + 3 + 2 = 7 PER

        round((((7 - 15) / 15)/2+0.5) * 4) = 1 alerted

        example 2

        10x raiders
        2+4+3+8+5+7+2+0+3+6 = 40 DEX
        20x defenders
        2+4+3+8+5+7+2+0+3+6+2+4+3+8+5+7+2+0+3+6 = 80 PER

        round((((80 - 40) / 80)/2+0.5) * 20) = 15 alerted
        */



        // Fight

        // Select alerted defenders randomly from available set


        $raider_hits = 0;
        $defender_hits = 0;

        if($alerted) {

            $alert_defenders = $defenders->random($alerted)->all();

            // Each raider attacks each defender
            foreach ($raiders as $raider) {
                foreach ($alert_defenders as $defender) {

                    $hit = $this->fight($raider, $defender) ;

                    if($hit) {
                        $raider_hits++;
                    }



                }
            }

            // Each defender attacks each raider
            foreach ($alert_defenders as $defender) {
                foreach ($raiders as $raider) {

                    $hit = $this->fight($raider, $defender);

                    if($hit) {
                        $defender_hits++;
                    }

                }
            }


            // Compare stats & deal damage

            /*
            4. Loot

            // Amount of loot taken depends upon:

            loot_available * raider_strength * raider_luck * awake_weighting

            // perhaps divide loot type based on template or relative amounts

            TODO Allow vehicles



            */


            $success = $this->weighting($raider_hits, $defender_hits);


        } else {
            $alert_defenders = null;
            $success = 1;
        }



        return collect([
            'defenders' => $defenders->toArray(),
            'raiders' => $raiders->toArray(),
            'infiltration' => [
                'defenders' => $alert_defenders
            ],
            'fight' => [
                'hits' => $raider_hits + $defender_hits,
                'raider_hits' => $raider_hits,
                'defender_hits' => $defender_hits,
                'success' => $success
            ],

        ]);

    }

    private function weighting($first, $last)
    {
        // Find weighting between -1 & 1
        $value =  ($first - $last);

        if($value != 0) {
            $value = $value / max([$first,$last]);
        }

        return $value;

    }

    private function fight($attacker, $defender)
    {
        $damage = $this->weighting($defender->constitution, $attacker->strength);

        if($damage > 0) {
            $this->damageCharacter($defender);
            \Notification::successInstant($attacker->firstname . ' hit ' . $defender->firstname . ' for ' . $damage);
            return true;
        } else {
            return false;
        }

    }


    private function alertCheck($attacker, $defender)
    {
        $alert = $this->weighting($attacker->dexterity, $defender->perception);

        $defender->alertness = $alert;

        if($defender->alertness) {

        }

        if($defender->alertness > 0) {
            $defender->alerted = true;
        }

    }


    private function damageCharacter($character)
    {

        $flight = \App\Models\Character::find(1);

        $flight->hp = $character->hp - 1;

        $flight->save();

    }

}
