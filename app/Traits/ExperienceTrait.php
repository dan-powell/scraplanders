<?php namespace App\Traits;

trait ExperienceTrait
{

    static function getLevelFromExperience($experience)
    {
        return floor(config('character.experience.constant') * sqrt($experience));
    }

    static function getExperienceFromLevel($level)
    {
        //return $level^2 / config('character.experience.constant');
        return round(pow($level / config('character.experience.constant'), 2));
    }

    static function getExperienceLevels($level, $range = 3)
    {
        $experience = self::getExperienceFromLevel($level);

        $levels = [$level => $experience];

        //2 => 54534453
        //3 => 5325245342542

        for($i = 0; $i < $range; $i++) {

            // Add a
            $up = $level + $i;
            $levels = $levels + [$up => self::getExperienceFromLevel($up)];

            $down = $level - $i;
            $levels = [$down => self::getExperienceFromLevel($down)] + $levels;
        }

        //dd($levels);

        return $levels;

    }

    static function getExperienceRequiredNextLevel($experience)
    {

        $current_level = self::getLevelFromExperience($experience);

        $next_level = $current_level + 1;

        $next_experience = self::getExperienceFromLevel($next_level);

        return round($next_experience - $experience);

    }


    static function distributePoints($points = 1)
	{

        $stats = config('character.stats');

        $stats_array = array_map(function() { return 0; }, $stats);


        for($i = 0; $i < $points; $i++) {
            // Choose a random stats
            $stat = array_rand($stats_array);
            $stats_array[$stat] = $stats_array[$stat] + 1;
        }

        return $stats_array;

		//return
	}

}
