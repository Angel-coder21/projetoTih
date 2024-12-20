<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Http\Requests\NovaRequest;

class Equipeviatura extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Equipeviatura>
     */
    public static $model = \App\Models\EquipeViatura::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    public static function label()
    {
        return 'Equipe de Viatura';
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {

        // $viaturas = \App\Models\viatura::all();


        return [
            ID::make()->sortable(),

            Text::make('Equipe','equipe_viatura')
            ->sortable()
            ->rules('max:255'),

            Select::make('Viatura' , 'fk_viatura')
            ->searchable()
            ->options(\App\Models\Viatura::where('situacao',' 1')->get()->pluck('identificacao', 'id'))
            ->displayUsingLabels(),

            Select::make('Condutor' , 'fk_user_condutor')
            ->searchable()
            ->options(\App\Models\User::get()->pluck('name', 'id'))
            ->displayUsingLabels(),

            Select::make('Médico(a)' , 'fk_user_medico')
            ->searchable()
            ->options(\App\Models\User::get()->pluck('name', 'id'))
            ->displayUsingLabels(),

            Select::make('Enfermeiro(a)' , 'fk_user_enfermeiro')
            ->searchable()
            ->options(\App\Models\User::get()->pluck('name', 'id'))
            ->displayUsingLabels(),

            Select::make('Técnico(a) Enfermagem' , 'fk_user_tec_enfermagem')
            ->searchable()
            ->options(\App\Models\User::get()->pluck('name', 'id'))
            ->displayUsingLabels(),

            Date::make('Data','data'),

            Select::make('Status' , 'status')
            ->options([
                '1' => 'Disponivel',
                '2' => 'Indisponivel',
            ])
            ->displayUsingLabels(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
