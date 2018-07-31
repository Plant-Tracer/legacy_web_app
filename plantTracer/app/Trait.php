<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

    trait chart {

    	public function charts(){

			$data = \Lava::DataTable();
            $data->addDateColumn('Day of Month')
                ->addNumberColumn('Projected')
                ->addNumberColumn('Official');

            // Random Data For Example
            for ($a = 1; $a < 20; $a++)
            {
                $rowData = [
                  "2014-8-$a", rand(0.95,2.25), rand(0.95,2.25)
                ];

                $data->addRow($rowData);
            }

            \Lava::LineChart('Stocks', $data, [
              'title' => 'X-axis(Circumnutation)'
            ]);

    }

    }