<?php
// Radio Button
// https://novapackages.com/packages/norman-huth/nova-radio-field

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
use NormanHuth\NovaRadioField\Radio;

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

            Heading::make('Preenchimento do NIR'),

            
            // Select::make('Status do Chamado','fk_status')
            // ->searchable()
            // ->options(\App\Models\Status::all()->pluck('nome', 'id'))
            // ->displayUsingLabels(),

            // DateTime::make('Data Chamado','dt_chamado'),

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

            Radio::make(__('Sexo'), 'paciente_sexo')
            ->options([
               'M' =>  __('Masculino'),
               'F' =>  __('Feminino'),
            ])->inline(),

            Textarea::make('Hipótese Diagnóstico','hipotese_diagnostico')
            ->rows(3)
            ,

            Radio::make(__('Classificação de Risco'), 'classificacao_risco')
            ->options([
                 __('Verde'),
                 __('Amarela'),
            ])->inline(),

            Select::make('Unidade de Origem' , 'fk_unidade_origem')
            ->searchable()
            ->options(\App\Models\Unidade::all()->pluck('nome', 'id'))
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

            Radio::make(__('Tipo de Viatura'), 'tipo_viatura')
            ->options([
                 __('Básica'),
                 __('Avançada'),
            ])->inline(),

            Textarea::make('Justificativa tipo de viatura','Justificativa_tipo_viatura')
            ->rows(2),

            Radio::make(__('Exame de Imagem'), 'exame_imagem')
            ->options([
                'False' =>  __('Não'),
                'true' =>  __('Sim'),
             ])->inline(),

            Radio::make(__('Avaliação'), 'avaliacao')
            ->options([
                'False' =>  __('Não'),
                'true' =>  __('Sim'),
             ])->inline(),

            Radio::make(__('Transferência Internação'), 'transferencia_internacao')
            ->options([
                'False' =>  __('Não'),
                'true' =>  __('Sim'),
             ])->inline(),

            Boolean::make('Outros','outros')
            ->trueValue('true')
            ->falseValue('False'),

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

            // Apartir daqui quem preencherá esse formulário é a equipe de Viatura - ORIGEM
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

            Radio::make(__('Ar Ambiente'), 'ar_ambiente_origem')
            ->options([
               'False' =>  __('Não'),
               'true' =>  __('Sim'),
            ])->inline(),

            Radio::make(__('Coletor Nasal'), 'coletor_nasal_origem')
            ->options([
               'False' =>  __('Não'),
               'true' =>  __('Sim'),
            ])->inline(),

            Textarea::make('Anotação Coletor Nasal','coletor_nasal_anotacao_origem')
            ->rows(2)
            ,

            Boolean::make('Máscara de Alto Fluxo','mascara_alto_fluxo_origem')
            ->trueValue('true')
            ->falseValue('False'),

            Textarea::make('Anotação Máscara de Alto Fluxo','mascara_alto_fluxo_anotacao_origem')
            ->rows(2)
            ,

            Select::make('Esforço Respiratório' , 'esfoco_respiratorio_origem')
            ->options([
                'Sem Esforço',
                'Leve',
                'Moderado',
                'Grave',
            ])
            ,

            Boolean::make('Bomba Infusora','bomba_infusora_origem')
            ->trueValue('true')
            ->falseValue('False'),

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

            Boolean::make('Paciente Entubado','paciente_entubado_origem')
            ->trueValue('true')
            ->falseValue('False'),


            Heading::make('Escala de Coma de Glasgow - Crianças abaixo de 4 anos'),

            Radio::make(__('Abertura ocular'), 'glasgow_AO_menor_origem')
            ->options([
                '4' => __('Abertura ocular espontânio'),
                '3' => __('Abertura ocular sob comando verbal'),
                '2' => __('Abertura ocular sob estímulo dolorosa'),
                '1' => __('Sem abertura ocular'),
            ]),
           
            Radio::make(__('Melhor Resposta Verbal'), 'glasgow_rv_menor_origem')
            ->options([
                '5' => __('Palavras apropriadas, riso social, olhar fixo que segue objetos'),
                '4' => __('Resposta Irritada'),
                '3' => __('Chora de dor'),
                '2' => __('Geme de dor'),
                '1' => __('Sem resposta verbal'),
            ]),            

            Radio::make(__('Melhor resposta Motora'), 'glasgow_rm_menor_origem')
            ->options([
                '6' => __('Move-se espontaneamente e intencionalmente'),
                '5' => __('Movimento de retirada em resposta ao toque'),
                '4' => __('Movimento de retirada em resposta á dor'),
                '3' => __('Postura decorticada(flexão anormal) em resposta á dor'),
                '2' => __('Postura descerebrada(extensão anormal) em resposta á dor'),
                '1' => __('Sem resposta motora'),
            ]),

            Heading::make('Escala de Coma de Glasgow - Adultos e crianças acima de 4 anos'),

            Radio::make(__('Abertura ocular'), 'glasgow_AO_maior_origem')
            ->options([
                '4' => __('Abertura ocular espontânio'),
                '3' => __('Abertura ocular sob comando verbal'),
                '2' => __('Abertura ocular sob estímulo dolorosa'),
                '1' => __('Sem abertura ocular'),
            ]),

            
            Radio::make(__('Melhor Resposta Verbal'), 'glasgow_rv_maior_origem')
            ->options([
                '5' => __('Resposta Adequada(Orientada)'),
                '4' => __('Resposta confusa'),
                '3' => __('Resposta inapropriadas'),
                '2' => __('Sons Incompreensíveis'),
                '1' => __('Sem resposta verbal'),
            ]),

            
            Radio::make(__('Melhor resposta Motora'), 'glasgow_rm_maior_origem')
            ->options([
                '6' => __('Obedece a comandos'),
                '5' => __('Localiza estímulos dolorosos'),
                '4' => __('Retira ao estímulo doloroso'),
                '3' => __('Flexão anormal(decorticação)'),
                '2' => __('Extensão anormal(descerebração)'),
                '1' => __('Sem resposta motora'),
            ]),

            
            Radio::make(__('Autorização de transferência'), 'autorizacao_transferencia_origem')
            ->options([
                 __('Não Tem'),
                 __('Não Entregue'),
                 __('Entregue'),                 
            ])->inline(),

            
            Radio::make(__('Exames de Procedimentos'), 'exame_procedimentos_origem')
            ->options([
                __('Não Tem'),
                __('Não Entregue'),
                __('Entregue'), 
            ])->inline(),

           
            Radio::make(__('Última Evolução'), 'ultima_evolucao_origem')
            ->options([
                __('Não Tem'),
                __('Não Entregue'),
                __('Entregue'), 
            ])->inline(),

            Radio::make(__('Última Prescrição'), 'ultima_prescricao_origem')
            ->options([
                __('Não Tem'),
                __('Não Entregue'),
                __('Entregue'), 
            ])->inline(),

            
            Radio::make(__('Teste Covid'), 'teste_covid_origem')
            ->options([
                __('Não Tem'),
                __('Não Entregue'),
                __('Entregue'), 
            ])->inline(),

            Radio::make(__('Documento pessoal do paciente'), 'documento_pessoal_paciente_origem')
            ->options([
                __('Não Tem'),
                __('Não Entregue'),
                __('Entregue'), 
            ])->inline(),

            Radio::make(__('Exame laboratorial'), 'exame_laboratorial_origem')
            ->options([
                __('Não Tem'),
                __('Não Entregue'),
                __('Entregue'), 
            ])->inline(),

            Radio::make(__('Exame imagem'), 'exame_imagem_origem')
            ->options([
                __('Não Tem'),
                __('Não Entregue'),
                __('Entregue'), 
            ])->inline(),

            Radio::make(__('BAM de entrada'), 'bam_entrada_origem')
            ->options([
                __('Não Tem'),
                __('Não Entregue'),
                __('Entregue'), 
            ])->inline(),

            Radio::make(__('Outro documento'), 'outro_doc_origem')
            ->options([
                __('Não Tem'),
                __('Não Entregue'),
                __('Entregue'), 
            ])->inline(),

            Textarea::make('Obsevarções Gerais','obs_gerais_origem')
            ->rows(2),

             // Apartir daqui quem preencherá esse formulário é a equipe de Viatura - DESTINO
             Heading::make('Preenchimento Equipe de Viatura (Unidade de Destino)'),

             Text::make('PA' , 'pa_destino')
             ->sortable()
             ->rules('required', 'max:255'),
 
             Text::make('X' , 'x_destino')
             ->sortable()
             ->rules('required', 'max:255'),
 
             Text::make('FC' , 'fc_destino')
             ->sortable()
             ->rules('required', 'max:255'),
 
             Text::make('FR' , 'fr_destino')
             ->sortable()
             ->rules('required', 'max:255'),
 
             Text::make('SpO2 ' , 'spo2_destino')
             ->sortable()
             ->rules('required', 'max:255'),
 
             Text::make('Glicemia' , 'glicemia_destino')
             ->sortable()
             ->rules('required', 'max:255'),
 
             Text::make('Taxa' , 'taxa_destino')
             ->sortable()
             ->rules('required', 'max:255'),
 
             Textarea::make('Anotação do Exame Físico','anotacoes_exame_fisico_destino')
             ->rows(2)
             ,
 
             Radio::make(__('Ar Ambiente'), 'ar_ambiente_destino')
             ->options([
                'False' =>  __('Não'),
                'true' =>  __('Sim'),
             ])->inline(),
 
             Radio::make(__('Coletor Nasal'), 'coletor_nasal_destino')
             ->options([
                'False' =>  __('Não'),
                'true' =>  __('Sim'),
             ])->inline(),
 
             Textarea::make('Anotação Coletor Nasal','coletor_nasal_anotacao_destino')
             ->rows(2)
             ,
 
             Boolean::make('Máscara de Alto Fluxo','mascara_alto_fluxo_destino')
             ->trueValue('true')
             ->falseValue('False'),
 
             Textarea::make('Anotação Máscara de Alto Fluxo','mascara_alto_fluxo_anotacao_destino')
             ->rows(2)
             ,
 
             Select::make('Esforço Respiratório' , 'esfoco_respiratorio_destino')
             ->options([
                 'Sem Esforço',
                 'Leve',
                 'Moderado',
                 'Grave',
             ])
             ,
 
             Boolean::make('Bomba Infusora','bomba_infusora_destino')
             ->trueValue('true')
             ->falseValue('False'),
 
             Textarea::make('Bomba Infusora 1','bomba_infusora_med_1_destino')
             ->rows(2)
             ,
 
             Textarea::make('Bomba Infusora 2','bomba_infusora_med_2_destino')
             ->rows(2)
             ,
 
             Textarea::make('Bomba Infusora 3','bomba_infusora_med_3_destino')
             ->rows(2),
 
             Textarea::make('Bomba Infusora 4','bomba_infusora_med_4_destino')
             ->rows(2),
 
             Textarea::make('Bomba Infusora 5','bomba_infusora_med_5_destino')
             ->rows(2),
 
             Boolean::make('Paciente Entubado','paciente_entubado_destino')
             ->trueValue('true')
             ->falseValue('False'),
 
 
             Heading::make('Escala de Coma de Glasgow - Crianças abaixo de 4 anos'),
 
             Radio::make(__('Abertura ocular'), 'glasgow_AO_menor_destino')
             ->options([
                 '4' => __('Abertura ocular espontânio'),
                 '3' => __('Abertura ocular sob comando verbal'),
                 '2' => __('Abertura ocular sob estímulo dolorosa'),
                 '1' => __('Sem abertura ocular'),
             ]),
            
             Radio::make(__('Melhor Resposta Verbal'), 'glasgow_rv_menor_destino')
             ->options([
                 '5' => __('Palavras apropriadas, riso social, olhar fixo que segue objetos'),
                 '4' => __('Resposta Irritada'),
                 '3' => __('Chora de dor'),
                 '2' => __('Geme de dor'),
                 '1' => __('Sem resposta verbal'),
             ]),            
 
             Radio::make(__('Melhor resposta Motora'), 'glasgow_rm_menor_destino')
             ->options([
                 '6' => __('Move-se espontaneamente e intencionalmente'),
                 '5' => __('Movimento de retirada em resposta ao toque'),
                 '4' => __('Movimento de retirada em resposta á dor'),
                 '3' => __('Postura decorticada(flexão anormal) em resposta á dor'),
                 '2' => __('Postura descerebrada(extensão anormal) em resposta á dor'),
                 '1' => __('Sem resposta motora'),
             ]),
 
             Heading::make('Escala de Coma de Glasgow - Adultos e crianças acima de 4 anos'),
 
             Radio::make(__('Abertura ocular'), 'glasgow_AO_maior_destino')
             ->options([
                 '4' => __('Abertura ocular espontânio'),
                 '3' => __('Abertura ocular sob comando verbal'),
                 '2' => __('Abertura ocular sob estímulo dolorosa'),
                 '1' => __('Sem abertura ocular'),
             ]),
 
             
             Radio::make(__('Melhor Resposta Verbal'), 'glasgow_rv_maior_destino')
             ->options([
                 '5' => __('Resposta Adequada(Orientada)'),
                 '4' => __('Resposta confusa'),
                 '3' => __('Resposta inapropriadas'),
                 '2' => __('Sons Incompreensíveis'),
                 '1' => __('Sem resposta verbal'),
             ]),
 
             
             Radio::make(__('Melhor resposta Motora'), 'glasgow_rm_maior_destino')
             ->options([
                 '6' => __('Obedece a comandos'),
                 '5' => __('Localiza estímulos dolorosos'),
                 '4' => __('Retira ao estímulo doloroso'),
                 '3' => __('Flexão anormal(decorticação)'),
                 '2' => __('Extensão anormal(descerebração)'),
                 '1' => __('Sem resposta motora'),
             ]),
 
             // https://novapackages.com/packages/norman-huth/nova-radio-field
             Radio::make(__('Autorização de transferência'), 'autorizacao_transferencia_destino')
             ->options([
                  __('Não Tem'),
                  __('Não Entregue'),
                  __('Entregue'),                 
             ])->inline(),
 
             
             Radio::make(__('Exames de Procedimentos'), 'exame_procedimentos_destino')
             ->options([
                 __('Não Tem'),
                 __('Não Entregue'),
                 __('Entregue'), 
             ])->inline(),
 
            
             Radio::make(__('Última Evolução'), 'ultima_evolucao_destino')
             ->options([
                 __('Não Tem'),
                 __('Não Entregue'),
                 __('Entregue'), 
             ])->inline(),
 
             Radio::make(__('Última Prescrição'), 'ultima_prescricao_destino')
             ->options([
                 __('Não Tem'),
                 __('Não Entregue'),
                 __('Entregue'), 
             ])->inline(),
 
             
             Radio::make(__('Teste Covid'), 'teste_covid_destino')
             ->options([
                 __('Não Tem'),
                 __('Não Entregue'),
                 __('Entregue'), 
             ])->inline(),
 
             Radio::make(__('Documento pessoal do paciente'), 'documento_pessoal_paciente_destino')
             ->options([
                 __('Não Tem'),
                 __('Não Entregue'),
                 __('Entregue'), 
             ])->inline(),
 
             Radio::make(__('Exame laboratorial'), 'exame_laboratorial_destino')
             ->options([
                 __('Não Tem'),
                 __('Não Entregue'),
                 __('Entregue'), 
             ])->inline(),
 
             Radio::make(__('Exame imagem'), 'exame_imagem_destino')
             ->options([
                 __('Não Tem'),
                 __('Não Entregue'),
                 __('Entregue'), 
             ])->inline(),
 
             Radio::make(__('BAM de entrada'), 'bam_entrada_destino')
             ->options([
                 __('Não Tem'),
                 __('Não Entregue'),
                 __('Entregue'), 
             ])->inline(),
 
             Radio::make(__('Outro documento'), 'outro_doc_destino')
             ->options([
                 __('Não Tem'),
                 __('Não Entregue'),
                 __('Entregue'), 
             ])->inline(),
 
             Textarea::make('Obsevarções Gerais','obs_gerais_destino')
             ->rows(2),

             Radio::make(__('Intercorrencia'), 'intercorrencia_destino')
             ->options([
                 __('Não Realizado'),
                 __('Intercorrencia'),
                 __('Realizada'), 
             ])->inline(),
 
             Textarea::make('Anotação Motivo de intercorrência','intercorrencia_motivo_anotacao_destino')
             ->rows(2),

             Select::make('Equipe de Viatura' , 'fk_tih_equipe_viatura')
            ->searchable()
            ->options(\App\Models\EquipeViatura::all()->pluck('id'))
            ->displayUsingLabels()            
            ,


            Heading::make('Registro Saída da Base'),

            DateTime::make('Registro hora','dt_rh_saida_base'),

            Select::make('Colaborador responsável' , 'fk_user_rh_saida_base')
            ->searchable()
            ->options(\App\Models\User::all()->pluck('name','id'))
            ->displayUsingLabels()            
            ,

            Heading::make('Registro chegada a unidade de Origem'),

            DateTime::make('Registro hora','dt_rh_unidade_origem'),

            Select::make('Colaborador responsável' , 'fk_user_rh_unidade_origem')
            ->searchable()
            ->options(\App\Models\User::all()->pluck('name','id'))
            ->displayUsingLabels()            
            ,

            Heading::make('Registro saída a unidade de Origem'),

            DateTime::make('Registro hora','dt_rh_saida_unidade_origem'),

            Select::make('Colaborador responsável' , 'fk_user_rh_saida_unidade_origem')
            ->searchable()
            ->options(\App\Models\User::all()->pluck('name','id'))
            ->displayUsingLabels()            
            ,

            Heading::make('Registro chegada a unidade de destino'),

            DateTime::make('Registro hora','dt_rh_chegada_unidade_destino'),

            Select::make('Colaborador responsável' , 'fk_user_rh_chegada_unidade_destino')
            ->searchable()
            ->options(\App\Models\User::all()->pluck('name','id'))
            ->displayUsingLabels()            
            ,

            Heading::make('Registro saída a unidade de destino'),

            DateTime::make('Registro hora','dt_rh_saida_unidade_destino'),

            Select::make('Colaborador responsável' , 'fk_user_rh_saida_unidade_destino')
            ->searchable()
            ->options(\App\Models\User::all()->pluck('name','id'))
            ->displayUsingLabels()            
            ,

            Heading::make('Registro chegada na base'),

            DateTime::make('Registro hora','dt_rh_chegada_base'),

            Select::make('Colaborador responsável' , 'fk_user_rh_chegada_base')
            ->searchable()
            ->options(\App\Models\User::all()->pluck('name','id'))
            ->displayUsingLabels()            
            ,






            



          




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
