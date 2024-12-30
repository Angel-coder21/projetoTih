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
use ShuvroRoy\NovaTabs\Tab;
use ShuvroRoy\NovaTabs\Tabs;
use ShuvroRoy\NovaTabs\Traits\HasActionsInTabs;
use ShuvroRoy\NovaTabs\Traits\HasTabs;


class Ratih extends Resource
{
    use HasTabs, HasActionsInTabs;
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

 
    protected function modUnidadeOrigem(NovaRequest $request)
    {
        if ($request->user()->hasRole(['super-admin'])) {
            return false;
        }
        return $request->user()->fk_unidade == $this->fk_unidade_destino;
    }
    
    protected function modUnidadeDestino(NovaRequest $request)
    {
        if ($request->user()->hasRole(['super-admin'])) {
            return false;
        }
        return $request->user()->fk_unidade == $this->fk_unidade_origem;        
    }

    protected function modViatura(NovaRequest $request)
    {
        if ($request->user()->hasRole(['super-admin', 'Motorista/Medico'])) {
            return false;
        }else{
            return true;
        }
               
    }



    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {

        return [
            Tabs::make('Ratih', [
                Tab::make(__('Unidade de Origem'), [


                    ID::make('Número do Chamado','id')->sortable(),

                    DateTime::make('Data do Chamado','dt_chamado')
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Text::make('Nome do Paciente' , 'paciente_nome')
                    ->sortable()
                    ->rules( 'max:255')
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Text::make('Prontuário do Paciente' , 'paciente_prontuario')
                    ->sortable()
                    ->rules( 'max:255')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),
                    
                    Date::make('Data Nascimento','paciente_dt_nascimento')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Radio::make(__('Sexo'), 'paciente_sexo')
                    ->options([
                    'M' =>  __('Masculino'),
                    'F' =>  __('Feminino'),
                    ])->inline()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Text::make('Hipótese Diagnóstica','hipotese_diagnostico')
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Radio::make(__('Classificação de Risco'), 'classificacao_risco')
                    ->options([
                        'Verde' => __('Verde'),
                        'Amarela' => __('Amarela'),
                    ])->inline()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Select::make('Unidade de Origem' , 'fk_unidade_origem')
                    ->searchable()
                    ->options(\App\Models\Unidade::all()->pluck('nome', 'id'))
                    ->displayUsingLabels()  
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    })          
                    ,

                    Text::make('Setor de Origem' , 'setor_origem')
                    ->sortable()
                    ->rules( 'max:255')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Select::make('Unidade de Destino' , 'fk_unidade_destino')
                    ->searchable()
                    ->options(\App\Models\Unidade::get()->pluck('nome', 'id'))
                    ->displayUsingLabels()  
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    })          
                    ,

                    Text::make('Setor de Destino' , 'setor_destino')
                    ->sortable()
                    ->rules( 'max:255')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Radio::make(__('Tipo de Viatura'), 'tipo_viatura')
                    ->options([
                        'Básica'=> __('Básica'),
                        'Avançada'=>__('Avançada'),
                    ])->inline()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Text::make('Justificativa tipo de viatura','Justificativa_tipo_viatura')
                    ->hideFromIndex()->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Radio::make(__('Recurso Solicitado'), 'recurso_solicitado')
                    ->options([
                        'exame'=> __('Exame de Imagem'),
                        'avancada'=>__('Avaliação'),
                        'transferencia'=>__('Transferência Internação'),
                        'outros'=>__('Outros'),
                    ])->inline()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Text::make('Outras Anotações','outros_anotacao')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Text::make('Nome do Médico Solicitante' , 'medico_solicitante_nome')
                    ->sortable()
                    ->rules( 'max:255')
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Number::make('CRM do Médico Solicitante' , 'medico_solicitante_crm')
                    ->sortable()
                    ->rules( 'max:255')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Text::make('Nome do Autorizador' , 'autorizacao_nome')
                    ->sortable()
                    ->rules( 'max:255')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Text::make('Função do Autorizador' , 'autorizacao_funcao')
                    ->sortable()
                    ->rules( 'max:255')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Number::make('Número de Matrícula do Autorizador' , 'autorizacao_matricula')
                    ->sortable()
                    ->rules( 'max:255')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                ]),


                Tab::make(__('Unidade de Origem - Sinais Vitais/Exame Físico'), [                     

                    Text::make('PA Sistólica' , 'pa_sitolica_origem')
                    ->sortable()
                    ->rules( 'max:255')
                    ->placeholder('Pressão Arterial Sistólica')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Text::make('PA Diastólica' , 'pa_diastolica_origem')
                    ->sortable()
                    ->rules( 'max:255')
                    ->placeholder('Pressão Arterial Diastólica')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Text::make('FC' , 'fc_origem')
                    ->sortable()
                    ->rules( 'max:255')
                    ->placeholder('Frequência Cardíaca')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Text::make('FR' , 'fr_origem')
                    ->sortable()
                    ->rules( 'max:255')
                    ->placeholder('Frequência Respiratória')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Text::make('SpO2' , 'spo2_origem')
                    ->sortable()
                    ->rules( 'max:255')
                    ->placeholder('Saturação de Oxigênio')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Text::make('Glicemia' , 'glicemia_origem')
                    ->sortable()
                    ->rules( 'max:255')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Text::make('Taxa' , 'taxa_origem')
                    ->sortable()
                    ->rules( 'max:255')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Textarea::make('Anotação do Exame Físico','anotacoes_exame_fisico_origem')
                    ->rows(1)
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Boolean::make('Ar Ambiente','ar_ambiente_origem')
                    ->trueValue('true')
                    ->falseValue('False')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Boolean::make('Coletor Nasal','coletor_nasal_origem')
                    ->trueValue('true')
                    ->falseValue('False')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),
                    
                    
                    Textarea::make('Anotação Coletor Nasal','coletor_nasal_anotacao_origem')
                    ->rows(1)
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Boolean::make('Máscara de Alto Fluxo','mascara_alto_fluxo_origem')
                    ->trueValue('true')
                    ->falseValue('false')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Textarea::make('Anotação Máscara de Alto Fluxo','mascara_alto_fluxo_anotacao_origem')
                    ->rows(1)
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),


                    Radio::make(__('Esforço Respiratório '), 'esfoco_respiratorio_origem')
                    ->options([
                        'Sem Esforço' => __('Sem Esforço'),
                        'Leve' => __('Leve'),
                        'Moderado' => __('Moderado'),
                        'Grave' => __('Grave'),
                    ])
                    ->inline()                    
                    ->default('Sem Esforço')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Boolean::make('Bomba Infusora','bomba_infusora_origem')
                    ->trueValue('true')
                    ->falseValue('False')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Textarea::make('Bomba Infusora 1','bomba_infusora_med_1_origem')
                    ->rows(1)
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    })
                    ,

                    Textarea::make('Bomba Infusora 2','bomba_infusora_med_2_origem')
                    ->rows(1)
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    })
                    ,

                    Textarea::make('Bomba Infusora 3','bomba_infusora_med_3_origem')
                    ->rows(1)
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Textarea::make('Bomba Infusora 4','bomba_infusora_med_4_origem')
                    ->rows(1)
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Textarea::make('Bomba Infusora 5','bomba_infusora_med_5_origem')
                    ->rows(1)
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Boolean::make('Paciente Entubado','paciente_entubado_origem')
                    ->trueValue('true')
                    ->falseValue('false')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),


                    Heading::make('Escala de Coma de Glasgow - Crianças abaixo de 4 anos')
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Number::make('Clasiificação de Glasgow','classidicacao_glasgow_menor_origem')
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Radio::make(__('Abertura ocular'), 'glasgow_AO_menor_origem')
                    ->options([
                        '4' => __('Abertura ocular espontânio'),
                        '3' => __('Abertura ocular sob comando verbal'),
                        '2' => __('Abertura ocular sob estímulo dolorosa'),
                        '1' => __('Sem abertura ocular'),
                    ])->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),
                
                    Radio::make(__('Melhor Resposta Verbal'), 'glasgow_rv_menor_origem')
                    ->options([
                        '5' => __('Palavras apropriadas, riso social, olhar fixo que segue objetos'),
                        '4' => __('Resposta Irritada'),
                        '3' => __('Chora de dor'),
                        '2' => __('Geme de dor'),
                        '1' => __('Sem resposta verbal'),
                    ])->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),      

                    Radio::make(__('Melhor resposta Motora'), 'glasgow_rm_menor_origem')
                    ->options([
                        '6' => __('Move-se espontaneamente e intencionalmente'),
                        '5' => __('Movimento de retirada em resposta ao toque'),
                        '4' => __('Movimento de retirada em resposta á dor'),
                        '3' => __('Postura decorticada(flexão anormal) em resposta á dor'),
                        '2' => __('Postura descerebrada(extensão anormal) em resposta á dor'),
                        '1' => __('Sem resposta motora'),
                    ])->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Heading::make('Escala de Coma de Glasgow - Adultos e crianças acima de 4 anos')
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Number::make('Clasiificação de Glasgow','classidicacao_glasgow_maior_origem')
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Radio::make(__('Abertura ocular'), 'glasgow_AO_maior_origem')
                    ->options([
                        '4' => __('Abertura ocular espontânio'),
                        '3' => __('Abertura ocular sob comando verbal'),
                        '2' => __('Abertura ocular sob estímulo dolorosa'),
                        '1' => __('Sem abertura ocular'),
                    ])->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    
                    Radio::make(__('Melhor Resposta Verbal'), 'glasgow_rv_maior_origem')
                    ->options([
                        '5' => __('Resposta Adequada(Orientada)'),
                        '4' => __('Resposta confusa'),
                        '3' => __('Resposta inapropriadas'),
                        '2' => __('Sons Incompreensíveis'),
                        '1' => __('Sem resposta verbal'),
                    ])->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    
                    Radio::make(__('Melhor resposta Motora'), 'glasgow_rm_maior_origem')
                    ->options([
                        '6' => __('Obedece a comandos'),
                        '5' => __('Localiza estímulos dolorosos'),
                        '4' => __('Retira ao estímulo doloroso'),
                        '3' => __('Flexão anormal(decorticação)'),
                        '2' => __('Extensão anormal(descerebração)'),
                        '1' => __('Sem resposta motora'),
                    ])->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Heading::make('Escala de Coma de RASS')
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Number::make('Clasiificação de Rass','classidicacao_rass_origem')
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Radio::make(__('Classificação de RASS'), 'rass_1_origem')
                    ->options([
                        '4' => __('Combativo'),
                        '3' => __('Muito Agitado'),
                        '2' => __('Agitado'),
                        '1' => __('Inquieto'),
                        '0' => __('Alerta e Calmo'),
                        '-1' => __('Sonolento'),
                        '-2' => __('Sedação Leve'),
                        '-3' => __('Sedação Moderada'),
                        '-4' => __('Sedação Intensa'),
                        '-5' => __('Não Desperta'),
                        
                    ])->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    
                    Radio::make(__('Autorização de transferência'), 'autorizacao_transferencia_origem')
                    ->options([
                        'Entregue' => __('Entregue'),  
                        'Não Entregue' => __('Não Entregue'),
                        'Não Tem' => __('Não Tem'),
                    ])
                    ->default('Entregue')
                    ->inline()
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    
                    Radio::make(__('Exames de Procedimentos'), 'exame_procedimentos_origem')
                    ->options([
                        'Entregue' => __('Entregue'),  
                        'Não Entregue' => __('Não Entregue'),
                        'Não Tem' => __('Não Tem'),
                    ])
                    ->default('Entregue')
                    ->inline()
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                
                    Radio::make(__('Última Evolução'), 'ultima_evolucao_origem')
                    ->options([
                        'Entregue' => __('Entregue'),  
                        'Não Entregue' => __('Não Entregue'),
                        'Não Tem' => __('Não Tem'),
                    ])
                    ->default('Entregue')
                    ->inline()
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Radio::make(__('Última Prescrição'), 'ultima_prescricao_origem')
                    ->options([
                        'Entregue' => __('Entregue'),  
                        'Não Entregue' => __('Não Entregue'),
                        'Não Tem' => __('Não Tem'),
                    ])
                    ->default('Entregue')
                    ->inline()
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    
                    Radio::make(__('Teste Covid'), 'teste_covid_origem')
                    ->options([
                        'Entregue' => __('Entregue'),  
                        'Não Entregue' => __('Não Entregue'),
                        'Não Tem' => __('Não Tem'),
                    ])
                    ->default('Entregue')
                    ->inline()
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Radio::make(__('Documento pessoal'), 'documento_pessoal_paciente_origem')
                    ->options([
                        'Entregue' => __('Entregue'),  
                        'Não Entregue' => __('Não Entregue'),
                        'Não Tem' => __('Não Tem'),
                    ])
                    ->default('Entregue')
                    ->inline()
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Radio::make(__('Exame laboratorial'), 'exame_laboratorial_origem')
                    ->options([
                        'Entregue' => __('Entregue'),  
                        'Não Entregue' => __('Não Entregue'),
                        'Não Tem' => __('Não Tem'),
                    ])
                    ->default('Entregue')
                    ->inline()
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Radio::make(__('Exame imagem'), 'exame_imagem_origem')
                    ->options([
                        'Entregue' => __('Entregue'),  
                        'Não Entregue' => __('Não Entregue'),
                        'Não Tem' => __('Não Tem'),
                    ])
                    ->default('Entregue')
                    ->inline()
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Radio::make(__('BAM de entrada'), 'bam_entrada_origem')
                    ->options([
                        'Entregue' => __('Entregue'),  
                        'Não Entregue' => __('Não Entregue'),
                        'Não Tem' => __('Não Tem'),
                    ])
                    ->default('Entregue')
                    ->inline()
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Radio::make(__('Outro documento'), 'outro_doc_origem')
                    ->options([
                        'Entregue' => __('Entregue'),  
                        'Não Entregue' => __('Não Entregue'),
                        'Não Tem' => __('Não Tem'),
                    ])
                    ->default('Entregue')
                    ->inline()
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                    Textarea::make('Obsevarções Gerais','obs_gerais_origem')
                    ->rows(1)
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeOrigem($request);                      
                    }),

                ]),
       
                Tab::make(__('Unidade de Destino - Sinais Vitais/Exame Físico'), [
                    // Apartir daqui quem preencherá esse formulário é a equipe de Viatura - DESTINO

                    Text::make('PA Sistólica' , 'pa_sitolica_destino')
                    ->sortable()
                    ->rules( 'max:255')
                    ->placeholder('Pressão Arterial Sistólica')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),

                    Text::make('PA Diastólica' , 'pa_diastolicadestino')
                    ->sortable()
                    ->rules( 'max:255')
                    ->placeholder('Pressão Arterial Diastólica')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Text::make('FC ' , 'fc_destino')
                    ->sortable()
                    ->rules( 'max:255')
                    ->placeholder('Frequência Cardíaca')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Text::make('FR ' , 'fr_destino')
                    ->sortable()
                    ->rules( 'max:255')
                    ->placeholder('Frequência Respiratória')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Text::make('SpO2 ' , 'spo2_destino')
                    ->sortable()
                    ->rules( 'max:255')
                    ->placeholder('Saturação de Oxigênio')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Text::make('Glicemia ' , 'glicemia_destino')
                    ->sortable()
                    ->rules( 'max:255')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Text::make('Taxa ' , 'taxa_destino')
                    ->sortable()
                    ->rules( 'max:255')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Textarea::make('Anotação do Exame Físico ','anotacoes_exame_fisico_destino')
                    ->rows(1)
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Boolean::make('Ar Ambiente ','ar_ambiente_destino')
                    ->trueValue('true')
                    ->falseValue('False')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),

                    Boolean::make('Coletor Nasal ','coletor_nasal_destino')
                    ->trueValue('true')
                    ->falseValue('False')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Textarea::make('Anotação Coletor Nasal ','coletor_nasal_anotacao_destino')
                    ->rows(1)
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Boolean::make('Máscara de Alto Fluxo ','mascara_alto_fluxo_destino')
                    ->trueValue('true')
                    ->falseValue('False')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Textarea::make('Anotação Máscara de Alto Fluxo ','mascara_alto_fluxo_anotacao_destino')
                    ->rows(1)
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),

                    Radio::make(__('Esforço Respiratório '), 'esfoco_respiratorio_destino')
                    ->options([
                        'Sem Esforço' => __('Sem Esforço'),
                        'Leve' => __('Leve'),
                        'Moderado' => __('Moderado'),
                        'Grave' => __('Grave'),
                    ])
                    ->inline()                    
                    ->default('Sem Esforço')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Boolean::make('Bomba Infusora ','bomba_infusora_destino')
                    ->trueValue('true')
                    ->falseValue('false')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Textarea::make('Bomba Infusora 1 ','bomba_infusora_med_1_destino')
                    ->rows(1)
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Textarea::make('Bomba Infusora 2 ','bomba_infusora_med_2_destino')
                    ->rows(1)
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Textarea::make('Bomba Infusora 3 ','bomba_infusora_med_3_destino')
                    ->rows(1)
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Textarea::make('Bomba Infusora 4 ','bomba_infusora_med_4_destino')
                    ->rows(1)
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Textarea::make('Bomba Infusora 5 ','bomba_infusora_med_5_destino')
                    ->rows(1)
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Boolean::make('Paciente Entubado ','paciente_entubado_destino')
                    ->trueValue('true')
                    ->falseValue('false')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
        
                    Heading::make('Escala de Coma de Glasgow - Crianças abaixo de 4 anos')
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),

                    Number::make('Clasiificação de Glasgow','classidicacao_glasgow_menor_destino')
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Radio::make(__('Abertura ocular '), 'glasgow_AO_menor_destino')
                    ->options([
                        '4' => __('Abertura ocular espontânio'),
                        '3' => __('Abertura ocular sob comando verbal'),
                        '2' => __('Abertura ocular sob estímulo dolorosa'),
                        '1' => __('Sem abertura ocular'),
                    ])
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
                    
                    Radio::make(__('Melhor Resposta Verbal '), 'glasgow_rv_menor_destino')
                    ->options([
                        '5' => __('Palavras apropriadas, riso social, olhar fixo que segue objetos'),
                        '4' => __('Resposta Irritada'),
                        '3' => __('Chora de dor'),
                        '2' => __('Geme de dor'),
                        '1' => __('Sem resposta verbal'),
                    ])
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),           
        
                    Radio::make(__('Melhor resposta Motora '), 'glasgow_rm_menor_destino')
                    ->options([
                        '6' => __('Move-se espontaneamente e intencionalmente'),
                        '5' => __('Movimento de retirada em resposta ao toque'),
                        '4' => __('Movimento de retirada em resposta á dor'),
                        '3' => __('Postura decorticada(flexão anormal) em resposta á dor'),
                        '2' => __('Postura descerebrada(extensão anormal) em resposta á dor'),
                        '1' => __('Sem resposta motora'),
                    ])
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Heading::make('Escala de Coma de Glasgow - Adultos e crianças acima de 4 anos')
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),

                    Number::make('Clasiificação de Glasgow','classidicacao_glasgow_maior_destino')
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Radio::make(__('Abertura ocular '), 'glasgow_AO_maior_destino')
                    ->options([
                        '4' => __('Abertura ocular espontânio'),
                        '3' => __('Abertura ocular sob comando verbal'),
                        '2' => __('Abertura ocular sob estímulo dolorosa'),
                        '1' => __('Sem abertura ocular'),
                    ])
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    
                    Radio::make(__('Melhor Resposta Verbal '), 'glasgow_rv_maior_destino')
                    ->options([
                        '5' => __('Resposta Adequada(Orientada)'),
                        '4' => __('Resposta confusa'),
                        '3' => __('Resposta inapropriadas'),
                        '2' => __('Sons Incompreensíveis'),
                        '1' => __('Sem resposta verbal'),
                    ])
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    
                    Radio::make(__('Melhor resposta Motora '), 'glasgow_rm_maior_destino')
                    ->options([
                        '6' => __('Obedece a comandos'),
                        '5' => __('Localiza estímulos dolorosos'),
                        '4' => __('Retira ao estímulo doloroso'),
                        '3' => __('Flexão anormal(decorticação)'),
                        '2' => __('Extensão anormal(descerebração)'),
                        '1' => __('Sem resposta motora'),
                    ])
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),

                    Heading::make('Escala de Coma de RASS')
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),

                    Number::make('Clasiificação de Rass','classidicacao_rass_destino')
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),

                    Radio::make(__('Classificação de RASS'), 'rass_1_destino')
                    ->options([
                        '4' => __('Combativo'),
                        '3' => __('Muito Agitado'),
                        '2' => __('Agitado'),
                        '1' => __('Inquieto'),
                        '0' => __('Alerta e Calmo'),
                        '-1' => __('Sonolento'),
                        '-2' => __('Sedação Leve'),
                        '-3' => __('Sedação Moderada'),
                        '-4' => __('Sedação Intensa'),
                        '-5' => __('Não Desperta'),
                        
                    ])->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    // https://novapackages.com/packages/norman-huth/nova-radio-field
                    Radio::make(__('Autorização de transferência '), 'autorizacao_transferencia_destino')
                    ->options([
                        'Entregue' => __('Entregue'),  
                        'Não Entregue' => __('Não Entregue'),
                        'Não Tem' => __('Não Tem'),
                    ])
                    ->default('Entregue')
                    ->inline()
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    
                    Radio::make(__('Exames de Procedimentos '), 'exame_procedimentos_destino')
                    ->options([
                        'Entregue' => __('Entregue'),  
                        'Não Entregue' => __('Não Entregue'),
                        'Não Tem' => __('Não Tem'),
                    ])
                    ->default('Entregue')
                    ->inline()
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    
                    Radio::make(__('Última Evolução '), 'ultima_evolucao_destino')
                    ->options([
                        'Entregue' => __('Entregue'),  
                        'Não Entregue' => __('Não Entregue'),
                        'Não Tem' => __('Não Tem'),
                    ])
                    ->default('Entregue')
                    ->inline()
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Radio::make(__('Última Prescrição '), 'ultima_prescricao_destino')
                    ->options([
                        'Entregue' => __('Entregue'),  
                        'Não Entregue' => __('Não Entregue'),
                        'Não Tem' => __('Não Tem'),
                    ])
                    ->default('Entregue')
                    ->inline()
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    
                    Radio::make(__('Teste Covid '), 'teste_covid_destino')
                    ->options([
                        'Entregue' => __('Entregue'),  
                        'Não Entregue' => __('Não Entregue'),
                        'Não Tem' => __('Não Tem'),
                    ])
                    ->default('Entregue')
                    ->inline()
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Radio::make(__('Documento pessoal'), 'documento_pessoal_paciente_destino')
                    ->options([
                        'Entregue' => __('Entregue'),  
                        'Não Entregue' => __('Não Entregue'),
                        'Não Tem' => __('Não Tem'),
                    ])
                    ->default('Entregue')
                    ->inline()
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Radio::make(__('Exame laboratorial '), 'exame_laboratorial_destino')
                    ->options([
                        'Entregue' => __('Entregue'),  
                        'Não Entregue' => __('Não Entregue'),
                        'Não Tem' => __('Não Tem'),
                    ])
                    ->default('Entregue')
                    ->inline()
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Radio::make(__('Exame imagem '), 'exame_imagem_destino')
                    ->options([
                        'Entregue' => __('Entregue'),  
                        'Não Entregue' => __('Não Entregue'),
                        'Não Tem' => __('Não Tem'),
                    ])
                    ->default('Entregue')
                    ->inline()
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Radio::make(__('BAM de entrada '), 'bam_entrada_destino')
                    ->options([
                        'Entregue' => __('Entregue'),  
                        'Não Entregue' => __('Não Entregue'),
                        'Não Tem' => __('Não Tem'),
                    ])
                    ->default('Entregue')
                    ->inline()
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Radio::make(__('Outro documento '), 'outro_doc_destino')
                    ->options([
                        'Entregue' => __('Entregue'),  
                        'Não Entregue' => __('Não Entregue'),
                        'Não Tem' => __('Não Tem'),
                    ])
                    ->default('Entregue')
                    ->inline()
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),
        
                    Textarea::make('Obsevarções Gerais ','obs_gerais_destino')
                    ->rows(1)
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modUnidadeDestino($request);                      
                    }),

                    

                ]),

                
                Tab::make(__('Equipe de Viatura'), [

                    Select::make('Equipe de Viatura' , 'fk_tih_equipe_viatura')
                    ->searchable()
                    ->options(\App\Models\EquipeViatura::all()->pluck('equipe_viatura','id'))
                    ->displayUsingLabels()            
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modViatura($request);                      
                    }),

                    Select::make('Nir de Origem' , 'fk_user_nir_origem')
                    ->searchable()
                    ->options(\App\Models\User::all()->pluck('name','id'))
                    ->displayUsingLabels()            
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modViatura($request);                      
                    }),

                    Select::make('Nir de Destino' , 'fk_user_nir_destino')
                    ->searchable()
                    ->options(\App\Models\User::all()->pluck('name','id'))
                    ->displayUsingLabels()            
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modViatura($request);                      
                    }),
    
                    Heading::make('Registro Saída da Base')
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modViatura($request);                      
                    }),
        
                    DateTime::make('Registro hora','dt_rh_saida_base')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modViatura($request);                      
                    }),
        
                    Select::make('Colaborador responsável' , 'fk_user_rh_saida_base')
                    ->searchable()
                    ->options(\App\Models\User::all()->pluck('name','id'))
                    ->displayUsingLabels()            
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modViatura($request);                      
                    }),
        
                    Heading::make('Registro chegada a unidade de Origem')
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modViatura($request);                      
                    }),
        
                    DateTime::make('Registro hora','dt_rh_unidade_origem')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modViatura($request);                      
                    }),
            
                    Select::make('Colaborador responsável' , 'fk_user_rh_unidade_origem')
                    ->searchable()
                    ->options(\App\Models\User::all()->pluck('name','id'))
                    ->displayUsingLabels()            
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modViatura($request);                      
                    }),

                    Heading::make('Registro saída a unidade de Origem')
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modViatura($request);                      
                    }),

                    DateTime::make('Registro hora','dt_rh_saida_unidade_origem')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modViatura($request);                      
                    }),

                    Select::make('Colaborador responsável' , 'fk_user_rh_saida_unidade_origem')
                    ->searchable()
                    ->options(\App\Models\User::all()->pluck('name','id'))
                    ->displayUsingLabels()            
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modViatura($request);                      
                    }),

        
                    Heading::make('Registro chegada a unidade de destino')
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modViatura($request);                      
                    }),
        
                    DateTime::make('Registro hora','dt_rh_chegada_unidade_destino')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modViatura($request);                      
                    }),
        
                    Select::make('Colaborador responsável' , 'fk_user_rh_chegada_unidade_destino')
                    ->searchable()
                    ->options(\App\Models\User::all()->pluck('name','id'))
                    ->displayUsingLabels()            
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modViatura($request);                      
                    }),
        
                    Heading::make('Registro saída a unidade de destino')
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modViatura($request);                      
                    }),
        
                    DateTime::make('Registro hora','dt_rh_saida_unidade_destino')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modViatura($request);                      
                    }),
        
                    Select::make('Colaborador responsável' , 'fk_user_rh_saida_unidade_destino')
                    ->searchable()
                    ->options(\App\Models\User::all()->pluck('name','id'))
                    ->displayUsingLabels()
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modViatura($request);                      
                    }),
        
                    Heading::make('Registro chegada na base')
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modViatura($request);                      
                    }),
        
                    DateTime::make('Registro hora','dt_rh_chegada_base')
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modViatura($request);                      
                    }),
        
                    Select::make('Colaborador responsável' , 'fk_user_rh_chegada_base')
                    ->searchable()
                    ->options(\App\Models\User::all()->pluck('name','id'))
                    ->displayUsingLabels()
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modViatura($request);                      
                    }),

                    Radio::make(__('Intercorrencia'), 'intercorrencia_destino')
                    ->options([
                        'Realizada' => __('Realizada'), 
                       'Não Realizado' => __('Não Realizado'),
                       'Intercorrencia' => __('Intercorrencia'),
                    ])->inline()
                    ->hideFromIndex()
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modViatura($request);                      
                    }),
        
                    Textarea::make('Anotação Motivo de intercorrência','intercorrencia_motivo_anotacao_destino')
                    ->rows(1)
                    ->readonly(function (NovaRequest $request) {                    
                        return $this->modViatura($request);                      
                    }),
                    
    
    
               ]),

           
        ]),

        ];
    }


    public static function indexQuery(NovaRequest $request, $query)
    {

        // Se o usuário for super-admin, ele pode ver todos os chamados
        if ($request->user()->hasRole(['super-admin','Base Samu','Motorista/Medico'])) {
            return $query;
        }
      
        return $query->where(function ($q) use ($request) {
            $q->where('fk_unidade_origem', $request->user()->fk_unidade)
              ->orWhere('fk_unidade_destino', $request->user()->fk_unidade);
        });     

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
