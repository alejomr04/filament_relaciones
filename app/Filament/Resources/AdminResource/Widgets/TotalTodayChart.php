<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use App\Models\Group;
use App\Models\Student;
use App\Models\User;
use Filament\Widgets\ChartWidget;

class TotalTodayChart extends ChartWidget
{
    protected static ?string $heading = 'Total de registros del día de hoy';

    protected function getData(): array
    {
        $newUsersToday = User::whereDate('created_at', today())->count();
        $newGroupsToday = Group::whereDate('created_at', today())->count();
        $newStudentsToday = Student::whereDate('created_at', today())->count();

        return [
            'datasets' => [
                [
                    'label' => 'Usuarios ',
                    'data' => [$newUsersToday],
                    'backgroundColor' => [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    'borderColor' => [
                        'rgba(155, 208, 245, 1)',
                        'rgba(255, 154, 162, 1)',
                        'rgba(255, 235, 153, 1)',
                    ],
                ],

                [
                    'label' => 'Grupos',
                    'data' => [$newGroupsToday],
                    'backgroundColor' => [

                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    'borderColor' => [

                        'rgba(255, 154, 162, 1)',
                        'rgba(255, 235, 153, 1)',
                    ],
                ],

                [
                    'label' => 'Estudiantes',
                    'data' => [$newStudentsToday],
                    'backgroundColor' => [


                        'rgba(255, 206, 86, 0.2)',
                    ],
                    'borderColor' => [


                        'rgba(255, 235, 153, 1)',
                    ],
                ],
            ],

            'labels' => ['Total registros hoy '],


        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
