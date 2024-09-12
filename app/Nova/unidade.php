<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Email;
use Laravel\Nova\Http\Requests\NovaRequest;

class Unidade extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Unidade>
     */
    public static $model = \App\Models\Unidade::class;

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
        'tipo','nome',
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

            
            Select::make('Tipo' , 'tipo')
            ->options([
                'HOSPITAL' =>  'HOSPITAL',
                'UBS' => 'UBS',
                'UPH' => 'UPH',
                'UPA' => 'UPA',
            ]),

            Text::make('Nome' , 'nome')
            ->sortable()
            ->rules('max:255'),

            Text::make('Endereço' , 'endereco')
            ->sortable()
            ->rules('max:255'),

            Text::make('Número' , 'numero')
            ->sortable()
            ->rules('max:255'),

            Text::make('Bairro' , 'bairro')
            ->sortable()
            ->rules('max:255'),

            Text::make('Município' , 'municipio')
            ->sortable()
            ->rules('max:255'),

            Text::make('Telefone' , 'contato_tel')
            ->sortable()
            ->rules('max:255'),

            Email::make('E-mail' , 'contato_email'),
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
