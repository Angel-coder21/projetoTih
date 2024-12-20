<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;

class Viatura extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Viatura>
     */
    public static $model = \App\Models\Viatura::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

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
        return [
            ID::make()->sortable(),

            Select::make('Situação' , 'situacao')
            ->options([
                '1' => 'Livre',
                '2' => 'Em Atendimento',
                '3' => 'Em Descontaminação',
                '4' => 'Em Manutenção',
                
            ])->sortable()
            ->displayUsingLabels(),

            Text::make('Identificação' , 'identificacao')
            ->sortable()
            ->rules('max:255'),

            Text::make('Placa' , 'placa')
            ->sortable()
            ->rules('max:255'),

            Select::make('Tipo' , 'tipo')
            ->options([
                'Básica' =>  'Basica',
                'Avançada' => 'Avancado',
            ]),
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
