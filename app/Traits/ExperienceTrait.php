<?php namespace App\Traits;

trait ExperienceTrait
{

    public function getLevelFromExperience($experience)
    {
        return floor(config('character.experience.constant') * sqrt($experience));
    }

    public function getExperienceFromLevel($level)
    {
        //return $level^2 / config('character.experience.constant');
        return round(pow($level / config('character.experience.constant'), 2));
    }

    public function getExperienceLevels($level, $range = 3)
    {
        $experience = $this->getExperienceFromLevel($level);

        $levels = [$level => $experience];

        //2 => 54534453
        //3 => 5325245342542

        for($i = 0; $i < $range; $i++) {

            // Add a
            $up = $level + $i;
            $levels = $levels + [$up => $this->getExperienceFromLevel($up)];

            $down = $level - $i;
            $levels = [$down => $this->getExperienceFromLevel($down)] + $levels;
        }

        //dd($levels);

        return $levels;

    }

    public function getExperienceRequiredNextLevel($experience)
    {

        $current_level = $this->getLevelFromExperience($experience);

        $next_level = $current_level + 1;

        $next_experience = $this->getExperienceFromLevel($next_level);

        return round($next_experience - $experience);

    }

}
