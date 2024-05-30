<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Group;
use App\Models\User;
use App\Models\Student;
use Filament\Forms\Components\Card;

class GroupStats extends BaseWidget
{
    protected function getStats(): array
    {
        $totalUsers = User::count();
        $newUsersToday = User::whereDate('created_at', today())->count();

        $totalGroups = Group::count();
        $newGroupsToday = Group::whereDate('created_at', today())->count();

        $totalStudents = Student::count();
        $newStudentsToday = Student::whereDate('created_at', today())->count();
            
        return [
            Stat::make('Total Usuarios (instructores)', $totalUsers)
            ->description('Usuarios registrados en total')
            ->color('success'),

            Stat::make('Total grupos nuevos hoy', $newGroupsToday)
            ->description('Registrados hoy')
            ->descriptionIcon('heroicon-m-users')   
            ->color('danger'),


            Stat::make('Total estudiantes', $totalStudents)
            ->description('Estudiantes registrados en total')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
        ];
    }
}
