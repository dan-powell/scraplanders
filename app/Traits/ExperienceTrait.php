<?php namespace App\Traits;

trait ExperienceTrait
{

    // Converts an experience value to the equivilent level
    static function getLevelFromExperience($experience)
    {
        return floor(config('character.experience.constant') * sqrt($experience));
    }

    // Converts an experience level to the total amount of experience required to acieve it
    static function getExperienceFromLevel($level)
    {
        return round(pow($level / config('character.experience.constant'), 2));
    }

    // Returns an array of levels above and below the level given
    // Handy for creating a table of level data
    static function getExperienceLevels($level, $range = 3)
    {
        // Get the experience for this level
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

        return $levels;
    }

    // Get the amount of experience required to reach the next level
    static function getExperienceRequiredNextLevel($experience)
    {

        $current_level = self::getLevelFromExperience($experience);

        $next_level = $current_level + 1;

        $next_experience = self::getExperienceFromLevel($next_level);

        return round($next_experience - $experience);

    }

    // Distributes points to stats randomly
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
	}
}
