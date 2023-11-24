<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tih_ratih', function (Blueprint $table) {
            $table->id();
            $table->dateTime('dt_chamado')->nullable();
            $table->String('numero_chamado',255)->nullable();
            $table->String('paciente_nome',255)->nullable();
            $table->String('paciente_prontuario',255)->nullable();
            $table->date('paciente_dt_nascimento',255)->nullable();
            $table->enum('paciente_sexo',['M','F'])->nullable();
            $table->longText('hipotese_diagnostico')->nullable();
            $table->enum('classificacao_risco',['Verde','Amarela'])->nullable();
            $table->unsignedBigInteger('fk_unidade_origem');
            $table->String('setor_origem',255)->nullable();
            $table->unsignedBigInteger('fk_unidade_destino');
            $table->String('setor_destino',255)->nullable();
            $table->enum('tipo_viatura',['Básica','Avançada'])->nullable();
            $table->longText('Justificativa_tipo_viatura')->nullable();
            $table->unsignedBigInteger('fk_user_cancelamento_ratih')->nullable();
            $table->longText('Justificativa_cancelamento_viatura')->nullable();
            $table->enum('exame_imagem',['True','False'])->nullable();
            $table->enum('avaliacao',['True','False'])->nullable();
            $table->enum('transferencia_internacao',['True','False'])->nullable();
            $table->enum('outros',['True','False'])->nullable();
            $table->longText('outros_anotacao')->nullable();
            $table->String('medico_solicitante_nome',255)->nullable();
            $table->integer('medico_solicitante_crm')->nullable();
            $table->String('autorizacao_nome',255)->nullable();
            $table->String('autorizacao_funcao',255)->nullable();
            $table->integer('autorizacao_matricula')->nullable();
            $table->String('pa_origem',255)->nullable();
            $table->String('x_origem',255)->nullable();
            $table->String('fc_origem',255)->nullable();
            $table->String('fr_origem',255)->nullable();
            $table->String('spo2_origem',255)->nullable();
            $table->String('glicemia_origem',255)->nullable();
            $table->String('taxa_origem',255)->nullable();
            $table->longText('anotacoes_exame_fisico_origem')->nullable();
            $table->enum('ar_ambiente_origem',['True','False'])->nullable();
            $table->enum('coletor_nasal_origem',['True','False'])->nullable();
            $table->longText('coletor_nasal_anotacao_origem')->nullable();
            $table->enum('mascara_alto_fluxo_origem',['True','False'])->nullable();
            $table->longText('mascara_alto_fluxo_anotacao_origem')->nullable();
            $table->enum('esfoco_respiratorio_origem',['Sem Esforço','Leve','Moderado','Grave'])->nullable();
            $table->enum('bomba_infusora_origem',['True','False'])->nullable();
            $table->longText('bomba_infusora_med_1_origem')->nullable();
            $table->longText('bomba_infusora_med_2_origem')->nullable();
            $table->longText('bomba_infusora_med_3_origem')->nullable();
            $table->longText('bomba_infusora_med_4_origem')->nullable();
            $table->longText('bomba_infusora_med_5_origem')->nullable();
            $table->enum('paciente_entubado_origem',['True','False'])->nullable();
            $table->enum('glasgow_ao_espontanea_origem',['0','4'])->nullable();
            $table->enum('glasgow_ao_verbal_origem',['0','3'])->nullable();
            $table->enum('glasgow_ao_doloroso_origem',['0','2'])->nullable();
            $table->enum('glasgow_ao_sem_origem',['0','1'])->nullable();
            $table->enum('glasgow_rv_adequada_origem',['0','5'])->nullable();
            $table->enum('glasgow_rv_confusa_origem',['0','4'])->nullable();
            $table->enum('glasgow_rv_inapropriadas_origem',['0','3'])->nullable();
            $table->enum('glasgow_rv_imcompreensiveis_origem',['0','2'])->nullable();
            $table->enum('glasgow_rv_sem_origem',['0','1'])->nullable();
            $table->enum('glasgow_rm_comandos_origem',['0','6'])->nullable();
            $table->enum('glasgow_rm_localiza_estimulos_dolorosos_origem',['0','5'])->nullable();
            $table->enum('glasgow_rm_retira_estimulo_doloroso_origem',['0','4'])->nullable();
            $table->enum('glasgow_rm_decorticacao_origem',['0','3'])->nullable();
            $table->enum('glasgow_rm_descerebracao_origem',['0','2'])->nullable();
            $table->enum('glasgow_rm_sem_origem',['0','1'])->nullable();
            $table->enum('rass_combativo_origem',['0','4'])->nullable();
            $table->enum('rass_muito_agitado_origem',['0','3'])->nullable();
            $table->enum('rass_agitado_origem_origem',['0','2'])->nullable();
            $table->enum('rass_inquieto_origem_origem',['0','1'])->nullable();
            $table->enum('rass_alerta_calmo_origem',['null','0'])->nullable();
            $table->enum('rass_sonolento_origem',['0','-1'])->nullable();
            $table->enum('rass_sedacao_leve_origem',['0','-2'])->nullable();
            $table->enum('rass_sedacao_moderada_origem',['0','-3'])->nullable();
            $table->enum('rass_sedacao_intensa_origem',['0','-4'])->nullable();
            $table->enum('rass_nao_desperta_origem',['0','-5'])->nullable();
            $table->enum('autorizacao_transferencia_origem',['Entregue','Não Entregue','Não Tem'])->nullable();
            $table->enum('exame_procedimentos_origem',['Entregue','Não Entregue','Não Tem'])->nullable();
            $table->enum('ultima_evolucao_origem',['Entregue','Não Entregue','Não Tem'])->nullable();
            $table->enum('ultima_prescricao_origem',['Entregue','Não Entregue','Não Tem'])->nullable();
            $table->enum('teste_covid_origem',['Entregue','Não Entregue','Não Tem'])->nullable();
            $table->enum('documento_pessoal_paciente_origem',['Entregue','Não Entregue','Não Tem'])->nullable();
            $table->enum('exame_laboratorial_origem',['Entregue','Não Entregue','Não Tem'])->nullable();
            $table->enum('exame_imagem_origem',['Entregue','Não Entregue','Não Tem'])->nullable();
            $table->enum('bam_entrada_origem',['Entregue','Não Entregue','Não Tem'])->nullable();
            $table->enum('outro_doc_origem',['Entregue','Não Entregue','Não Tem'])->nullable();
            $table->longtext('obs_gerais_origem')->nullable();
            $table->String('pa_destino',255)->nullable();
            $table->String('x_destino',255)->nullable();
            $table->String('fc_destino',255)->nullable();
            $table->String('fr_destino',255)->nullable();
            $table->String('spo2_destino',255)->nullable();
            $table->String('glicemia_destino',255)->nullable();
            $table->String('taxa_destino',255)->nullable();
            $table->longtext('anotacoes_exame_fisico_destino')->nullable();
            $table->enum('ar_ambiente_destino',['True','False'])->nullable();
            $table->enum('coletor_nasal_destino',['True','False'])->nullable();
            $table->String('coletor_nasal_anotacao_destino',255)->nullable();
            $table->enum('mascara_alto_fluxo_destino',['True','False'])->nullable();
            $table->String('mascara_alto_fluxo_anotacao_destino',255)->nullable();
            $table->enum('esfoco_respiratorio_destino',['Sem Esforço','Leve','Moderado','Grave'])->nullable();
            $table->enum('bomba_infusora_destino',['True','False'])->nullable();
            $table->enum('glasgow_ao_espontanea_destino',['0','4'])->nullable();
            $table->enum('glasgow_ao_verbal_destino',['0','3'])->nullable();
            $table->enum('glasgow_ao_doloroso_destino',['0','2'])->nullable();
            $table->enum('glasgow_ao_sem_destino',['0','1'])->nullable();
            $table->enum('glasgow_rv_adequada_destino',['0','5'])->nullable();
            $table->enum('glasgow_rv_confusa_destino',['0','4'])->nullable();
            $table->enum('glasgow_rv_inapropriadas_destino',['0','3'])->nullable();
            $table->enum('glasgow_rv_imcompreensiveis_destino',['0','2'])->nullable();
            $table->enum('glasgow_rv_sem_destino',['0','1'])->nullable();
            $table->enum('glasgow_rm_comandos_destino',['0','6'])->nullable();
            $table->enum('glasgow_rm_localiza_estimulos_dolorosos_destino',['0','5'])->nullable();
            $table->enum('glasgow_rm_retira_estimulo_doloroso_destino',['0','4'])->nullable();
            $table->enum('glasgow_rm_decorticacao_destino',['0','3'])->nullable();
            $table->enum('glasgow_rm_descerebracao_destino',['0','2'])->nullable();
            $table->enum('glasgow_rm_sem_destino',['0','1'])->nullable();
            $table->enum('rass_combativo_destino',['0','4'])->nullable();
            $table->enum('rass_muito_agitado_destino',['0','3'])->nullable();
            $table->enum('rass_agitado_origem_destino',['0','2'])->nullable();
            $table->enum('rass_inquieto_origem_destino',['0','1'])->nullable();
            $table->enum('rass_alerta_calmo_destino',['null','0'])->nullable();
            $table->enum('rass_sonolento_destino',['0','-1'])->nullable();
            $table->enum('rass_sedacao_leve_destino',['0','-2'])->nullable();
            $table->enum('rass_sedacao_moderada_destino',['0','-3'])->nullable();
            $table->enum('rass_sedacao_intensa_destino',['0','-4'])->nullable();
            $table->enum('rass_nao_desperta_destino',['0','-5'])->nullable();
            $table->enum('autorizacao_transferencia_destino',['Entregue','Não Entregue','Não Tem'])->nullable();
            $table->enum('exame_procedimentos_destino',['Entregue','Não Entregue','Não Tem'])->nullable();
            $table->enum('ultima_evolucao_destino',['Entregue','Não Entregue','Não Tem'])->nullable();
            $table->enum('ultima_prescricao_destino',['Entregue','Não Entregue','Não Tem'])->nullable();
            $table->enum('teste_covid_destino',['Entregue','Não Entregue','Não Tem'])->nullable();
            $table->enum('documento_pessoal_paciente_destino',['Entregue','Não Entregue','Não Tem'])->nullable();
            $table->enum('exame_laboratorial_destino',['Entregue','Não Entregue','Não Tem'])->nullable();
            $table->enum('exame_imagem_destino',['Entregue','Não Entregue','Não Tem'])->nullable();
            $table->enum('bam_entrada_destino',['Entregue','Não Entregue','Não Tem'])->nullable();
            $table->enum('outro_doc_destino',['Entregue','Não Entregue','Não Tem'])->nullable();
            $table->longtext('obs_gerais_destino')->nullable();
            $table->enum('intercorrencia_destino',['Realizada','Intercorrencia','Não Realizado'])->nullable();
            $table->longText('intercorrencia_motivo_anotacao_destino')->nullable();
            $table->unsignedBigInteger('fk_tih_equipe_viatura')->nullable();
            $table->dateTime('dt_rh_saida_base')->nullable();
            $table->unsignedBigInteger('fk_user_rh_saida_base')->nullable();
            $table->dateTime('dt_rh_unidade_origem')->nullable();
            $table->unsignedBigInteger('fk_user_rh_unidade_origem')->nullable();
            $table->dateTime('dt_rh_saida_unidade_origem')->nullable();
            $table->unsignedBigInteger('fk_user_rh_saida_unidade_origem')->nullable();
            $table->dateTime('dt_rh_chegada_unidade_destino')->nullable();
            $table->unsignedBigInteger('fk_user_rh_chegada_unidade_destino')->nullable();
            $table->dateTime('dt_rh_saida_unidade_destino')->nullable();
            $table->unsignedBigInteger('fk_user_rh_saida_unidade_destino')->nullable();
            $table->dateTime('dt_rh_chegada_base')->nullable();  
            $table->unsignedBigInteger('fk_user_rh_chegada_base')->nullable();
            $table->timestamps();


            $table->foreign('fk_unidade_origem')->references('id')->on('tih_unidade');
            $table->foreign('fk_unidade_destino')->references('id')->on('tih_unidade');
            $table->foreign('fk_tih_equipe_viatura')->references('id')->on('tih_equipe_viatura');
            $table->foreign('fk_user_cancelamento_ratih')->references('id')->on('users');
            $table->foreign('fk_user_rh_saida_base')->references('id')->on('users');
            $table->foreign('fk_user_rh_unidade_origem')->references('id')->on('users');
            $table->foreign('fk_user_rh_saida_unidade_origem')->references('id')->on('users');
            $table->foreign('fk_user_rh_chegada_unidade_destino')->references('id')->on('users');
            $table->foreign('fk_user_rh_saida_unidade_destino')->references('id')->on('users');
            $table->foreign('fk_user_rh_chegada_base')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tih_ratih');
    }
};
