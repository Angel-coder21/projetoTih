<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Http\Requests\NovaRequest;

class Ratih extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Ratih>
     */
    public static $model = \App\Models\Ratih::class;

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

            Heading::make('Preenchimento da Unidade'),

            DateTime::make('Data Chamado','dt_chamado'),

            Text::make('Número do Chamado' , 'numero_chamado')
            ->sortable()
            ->rules('required', 'max:255'),

            Text::make('Nome do Paciente' , 'paciente_nome')
            ->sortable()
            ->rules('required', 'max:255'),

            Text::make('Prontuário do Paciente' , 'paciente_prontuario')
            ->sortable()
            ->rules('required', 'max:255'),
            
            Date::make('Data Nascimento','paciente_dt_nascimento')
            ,

            Select::make('Sexo','paciente_sexo')
            ->options([
                'M' => 'Masculino',
                'F' => 'Feminino',
            ])
            ,

            Textarea::make('Hipótese Diagnóstica','hipotese_diagnostico')
            ->rows(3)
            ,

            Select::make('Classificação de Risco','classificacao_risco')
            ->options([
                'Verde',
                'Amarela',
            ])
            ,

            Select::make('Unidade de Origem' , 'fk_unidade_origem')
            ->searchable()
            ->options(\App\Models\Unidade::get()->pluck('nome', 'id'))
            ->displayUsingLabels()            
            ,

            Text::make('Setor de Origem' , 'setor_origem')
            ->sortable()
            ->rules('required', 'max:255'),

            Select::make('Unidade de Destino' , 'fk_unidade_destino')
            ->searchable()
            ->options(\App\Models\Unidade::get()->pluck('nome', 'id'))
            ->displayUsingLabels()            
            ,

            Text::make('Setor de Destino' , 'setor_destino')
            ->sortable()
            ->rules('required', 'max:255'),

            Select::make('Tipo de Viatura' , 'tipo_viatura')
            ->options([
                'Básica' =>  'Basica',
                'Avançada' => 'Avancado',
            ])
            ,

            Textarea::make('Justificativa tipo de viatura','Justificativa_tipo_viatura')
            ->rows(2)
            ,

            Boolean::make('Exame de Imagem','exame_imagem'),

            Boolean::make('Avaliação','avaliacao'),

            Boolean::make('Transferncia Internacao','transferencia_internacao'),

            Boolean::make('Outros','outros'),

            Textarea::make('Outras Anotações','outros_anotacao')
            ->rows(2)
            ,

            Text::make('Nome do Médico Solicitante' , 'medico_solicitante_nome')
            ->sortable()
            ->rules('required', 'max:255'),

            Number::make('CRM do Médico Solicitante' , 'medico_solicitante_crm')
            ->sortable()
            ->rules('required', 'max:255'),

            Text::make('Nome do Autorizador' , 'autorizacao_nome')
            ->sortable()
            ->rules('required', 'max:255'),

            Text::make('Função do Autorizador' , 'autorizacao_funcao')
            ->sortable()
            ->rules('required', 'max:255'),

            Number::make('Número de Matrícula do Autorizador' , 'autorizacao_matricula')
            ->sortable()
            ->rules('required', 'max:255'),

            // Apartir daqui quem preencherá esse formulário é a equipe de Viatura
            Heading::make('Preenchimento Equipe de Viatura (Unidade de Origem)'),

            Text::make('PA' , 'pa_origem')
            ->sortable()
            ->rules('required', 'max:255'),

            Text::make('X' , 'x_origem')
            ->sortable()
            ->rules('required', 'max:255'),

            Text::make('FC' , 'fc_origem')
            ->sortable()
            ->rules('required', 'max:255'),

            Text::make('FR' , 'fr_origem')
            ->sortable()
            ->rules('required', 'max:255'),

            Text::make('SpO2 ' , 'spo2_origem')
            ->sortable()
            ->rules('required', 'max:255'),

            Text::make('Glicemia' , 'glicemia_origem')
            ->sortable()
            ->rules('required', 'max:255'),

            Text::make('Taxa' , 'taxa_origem')
            ->sortable()
            ->rules('required', 'max:255'),

            Textarea::make('Anotação do Exame Físico','anotacoes_exame_fisico_origem')
            ->rows(2)
            ,

            Boolean::make('Ar Ambiente','ar_ambiente_origem'),

            Boolean::make('Coletor Nasal','coletor_nasal_origem'),

            Textarea::make('Anotação Coletor Nasal','coletor_nasal_anotacao_origem')
            ->rows(2)
            ,

            Boolean::make('Máscara de Alto Fluxo','mascara_alto_fluxo_origem'),

            Textarea::make('Anotação Máscara de Alto Fluxo','mascara_alto_fluxo_anotacao_origem')
            ->rows(2)
            ,

            Select::make('Esforço Respiratorio' , 'esfoco_respiratorio_origem')
            ->options([
                'Sem Esforço',
                'Leve',
                'Moderado',
                'Grave',
            ])
            ,

            Boolean::make('Bomba Infusora','bomba_infusora_origem'),

            Textarea::make('Bomba Infusora 1','bomba_infusora_med_1_origem')
            ->rows(2)
            ,

            Textarea::make('Bomba Infusora 2','bomba_infusora_med_2_origem')
            ->rows(2)
            ,

            Textarea::make('Bomba Infusora 3','bomba_infusora_med_3_origem')
            ->rows(2),

            Textarea::make('Bomba Infusora 4','bomba_infusora_med_4_origem')
            ->rows(2),

            Textarea::make('Bomba Infusora 5','bomba_infusora_med_5_origem')
            ->rows(2),

            Boolean::make('Paciente Entubado','paciente_entubado_origem'),

            Boolean::make('paciente_entubado_origem')
            ->trueValue('4')
            ->falseValue('0'),


          




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
