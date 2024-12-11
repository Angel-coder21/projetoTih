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
            $table->String('paciente_sexo',255)->nullable();
            $table->longText('hipotese_diagnostico')->nullable();
            $table->String('classificacao_risco',255)->nullable();
            $table->unsignedBigInteger('fk_unidade_origem')->nullable();
            $table->String('setor_origem',255)->nullable();
            $table->unsignedBigInteger('fk_unidade_destino')->nullable();
            $table->String('setor_destino',255)->nullable();
            $table->enum('tipo_viatura',['Básica','Avançada'])->nullable();
            $table->longText('Justificativa_tipo_viatura')->nullable();
            $table->unsignedBigInteger('fk_user_cancelamento_ratih')->nullable();
            $table->longText('Justificativa_cancelamento_viatura')->nullable();
            $table->String('recurso_solicitado',255)->nullable();
            $table->longText('outros_anotacao')->nullable();
            $table->String('medico_solicitante_nome',255)->nullable();
            $table->integer('medico_solicitante_crm')->nullable();
            $table->String('autorizacao_nome',255)->nullable();
            $table->String('autorizacao_funcao',255)->nullable();
            $table->integer('autorizacao_matricula')->nullable();
            $table->String('pa_sitolica_origem',255)->nullable();
            $table->String('pa_diastolica_origem',255)->nullable();
            $table->String('fc_origem',255)->nullable();
            $table->String('fr_origem',255)->nullable();
            $table->String('spo2_origem',255)->nullable();
            $table->String('glicemia_origem',255)->nullable();
            $table->String('taxa_origem',255)->nullable();
            $table->longText('anotacoes_exame_fisico_origem')->nullable();
            $table->enum('ar_ambiente_origem',['true','false'])->nullable();
            $table->enum('coletor_nasal_origem',['true','false'])->nullable();
            $table->longText('coletor_nasal_anotacao_origem')->nullable();
            $table->enum('mascara_alto_fluxo_origem',['true','false'])->nullable();
            $table->longText('mascara_alto_fluxo_anotacao_origem')->nullable();
            $table->enum('esfoco_respiratorio_origem',['Sem Esforço','Leve','Moderado','Grave'])->nullable();
            $table->enum('bomba_infusora_origem',['true','false'])->nullable();
            $table->longText('bomba_infusora_med_1_origem')->nullable();
            $table->longText('bomba_infusora_med_2_origem')->nullable();
            $table->longText('bomba_infusora_med_3_origem')->nullable();
            $table->longText('bomba_infusora_med_4_origem')->nullable();
            $table->longText('bomba_infusora_med_5_origem')->nullable();
            $table->enum('paciente_entubado_origem',['true','false'])->nullable();
            $table->integer('classidicacao_glasgow_menor_origem')->nullable();
            $table->integer('glasgow_AO_menor_origem')->nullable();
            $table->integer('glasgow_rv_menor_origem')->nullable();
            $table->integer('glasgow_rm_menor_origem')->nullable();
            $table->integer('classidicacao_glasgow_maior_origem')->nullable();
            $table->integer('glasgow_AO_maior_origem')->nullable();
            $table->integer('glasgow_rv_maior_origem')->nullable();
            $table->integer('glasgow_rm_maior_origem')->nullable();
            $table->integer('classidicacao_rass_origem')->nullable();
            $table->integer('rass_1_origem')->nullable();
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
            $table->String('pa_sitolica_destino',255)->nullable();
            $table->String('pa_diastolicadestino',255)->nullable();
            $table->String('fc_destino',255)->nullable();
            $table->String('fr_destino',255)->nullable();
            $table->String('spo2_destino',255)->nullable();
            $table->String('glicemia_destino',255)->nullable();
            $table->String('taxa_destino',255)->nullable();
            $table->longtext('anotacoes_exame_fisico_destino')->nullable();
            $table->enum('ar_ambiente_destino',['true','false'])->nullable();
            $table->enum('coletor_nasal_destino',['true','false'])->nullable();
            $table->String('coletor_nasal_anotacao_destino',255)->nullable();
            $table->enum('mascara_alto_fluxo_destino',['true','false'])->nullable();
            $table->String('mascara_alto_fluxo_anotacao_destino',255)->nullable();
            $table->enum('esfoco_respiratorio_destino',['Sem Esforço','Leve','Moderado','Grave'])->nullable();
            $table->enum('bomba_infusora_destino',['true','false'])->nullable();
            $table->longText('bomba_infusora_med_1_destino')->nullable();
            $table->longText('bomba_infusora_med_2_destino')->nullable();
            $table->longText('bomba_infusora_med_3_destino')->nullable();
            $table->longText('bomba_infusora_med_4_destino')->nullable();
            $table->longText('bomba_infusora_med_5_destino')->nullable();
            $table->enum('paciente_entubado_destino',['true','false'])->nullable();
            $table->integer('classidicacao_glasgow_menor_destino')->nullable();
            $table->integer('glasgow_AO_menor_destino')->nullable();
            $table->integer('glasgow_rv_menor_destino')->nullable();
            $table->integer('glasgow_rm_menor_destino')->nullable();
            $table->integer('classidicacao_glasgow_maior_destino')->nullable();
            $table->integer('glasgow_AO_maior_destino')->nullable();
            $table->integer('glasgow_rv_maior_destino')->nullable();
            $table->integer('glasgow_rm_maior_destino')->nullable();
            $table->integer('classidicacao_rass_destino')->nullable();
            $table->integer('rass_1_destino')->nullable();
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
            $table->unsignedBigInteger('fk_user_nir_origem')->nullable();
            $table->unsignedBigInteger('fk_user_nir_destino')->nullable();        
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
            $table->foreign('fk_user_nir_origem')->references('id')->on('users');
            $table->foreign('fk_user_nir_destino')->references('id')->on('users');
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
