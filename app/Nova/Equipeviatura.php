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
    public static $model = \App\Models\Equipeviatura::class;

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

        $viaturas = \App\Models\viatura::all();

        $tipo_viaturas =  $viaturas->pluck('nome', 'id')->all();


        return [
            ID::make()->sortable(),


            Select::make('Viatura' , 'fk_viatura')
            ->options([
                '1' =>  'HOSPITAL',
                '2' => 'UBS',
                '3' => 'UPH',
                '4' => 'UPA',
            ])
            ->rules('required'),

            Select::make('Condutor' , 'fk_user_condutor')
            ->options([
                '1' =>  'HOSPITAL',
                '2' => 'UBS',
                '3' => 'UPH',
                '4' => 'UPA',
            ])
            ->rules('required'),

            Select::make('Médico(a)' , 'fk_user_medico')
            ->options([
                '1' =>  'HOSPITAL',
                '2' => 'UBS',
                '3' => 'UPH',
                '4' => 'UPA',
            ]),

            Select::make('Enfermeiro(a)' , 'fk_user_enfermeiro')
            ->options([
                '1' =>  'HOSPITAL',
                '2' => 'UBS',
                '3' => 'UPH',
                '4' => 'UPA',
            ]),

            Select::make('Técnico(a) Enfermagem' , 'fk_user_tec_enfermagem')
            ->options([
                '1' =>  'HOSPITAL',
                '2' => 'UBS',
                '3' => 'UPH',
                '4' => 'UPA',
            ]),

            Date::make('Data','data'),

            Select::make('Status' , 'status')
            ->options([
                '1' => 'Disponivel',
                '2' => 'Indisponivel',
            ])
            ->rules('required'),
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
