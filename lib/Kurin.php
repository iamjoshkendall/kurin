<?php

namespace jtkendall;

use \Carbon\Carbon;

class Kurin
{
    /**
     * Converts a CSV file into an array with named keys
     *
     * @param string $file
     * @param array $keys
     * @param array $carbon
     * @return array
     */
    public static function fromCSV(string $file, $keys = [], $carbon = [])
    {
        $rows = [];
        if (count($carbon) > 0) {
            $keys = array_merge($keys, $carbon);
        }

        $file = fopen($file, 'r');

        while (!feof($file)) {
            $values = fgetcsv($file);

            for ($i = 0; $i < count($carbon); $i++) {
                $values[] = Carbon::now();
            }

            if ((is_array($values) && is_array($keys)) && (count($values) == count($keys))) {
                $rows[] = array_combine($keys, $values);
            }
        }

        fclose($file);

        return $rows;
    }
}
