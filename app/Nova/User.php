<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use NormanHuth\NovaRadioField\Radio;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Http\Requests\NovaRequest;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\User>
     */
    public static $model = \App\Models\User::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    public static function label()
    {
        return 'Usuários';
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'email',
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

            // Gravatar::make()->maxWidth(50),

            Text::make('Nome','name')
            ->sortable()
            ->rules('max:255'),

            Select::make('Unidade' , 'fk_unidade')
            ->searchable()
            ->options(\App\Models\Unidade::all()->pluck('nome', 'id'))
            ->displayUsingLabels(),

            Select::make('Cargo' , 'fk_cargo')
            ->searchable()
            ->options(\App\Models\Cargo::all()->pluck('nome_cargo', 'id'))
            ->displayUsingLabels(),

            Radio::make(__('Documento'), 'tipo_documento')
            ->options([
               'CPF' => __('CPF'),
               'CRM' => __('CRM'),
               'COREN' => __('COREN'),
               'CNH' => __('CNH'),
            ])->inline(),

            text::make('Número de Registro','numero_documento')
            ->sortable(),

            Number::make('Número Contato','contato_tel')
            ->sortable(),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', Rules\Password::defaults())
                ->updateRules('nullable', Rules\Password::defaults()),

            Radio::make(__('Status'), 'status')
            ->options([
               '1' =>  __('Ativado'),
               '0' =>  __('Desativado'),
            ])->inline(),
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
