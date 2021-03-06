<?php $__env->startSection('content'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    $(function(){
      $('section#hide_section article div.btn').click(function(){
        $(this).siblings('div.row').slideToggle();        
    });  
  });
</script>

<div class="wrapper">
    <div class="main-panel">        
        <nav class="navbar navbar-default navbar-fixed">         
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">                    
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <div class="row">
                                    <div class="col-md-5">
                                        <ul>
                                            <li style="list-style-type:none;">
                                                <h4 class="title">Ficha de Cadastro</h4>
                                            </li>
                                            <li style="list-style-type:none;">
                                                <p class="category">Ficha de Cadastro de Crianças no Sistema</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <ul>
                                           <li style="list-style-type:none; text-align: right; float:left;">
                                            <a href="<?php echo e(url('/register_child')); ?>" class="btn btn-primary btn-lg">
                                            <span class="glyphicon glyphicon-list"></span>Registrar Nova Criança</a>
                                        </li>

                                        <li style="list-style-type:none; text-align: right; margin-right: 8%;">
                                            <a href="<?php echo e(url('/list_child')); ?>" class="btn btn-primary btn-lg">
                                                <span class="glyphicon glyphicon-list"></span> Listar Crianças</a>
                                            </li>                                           
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <?php if(session('success')): ?>
                                    <p class="alert-success" align="center">
                                    <?php echo e(session('success')); ?> </p>
                                    <?php endif; ?>

                                    <form action="<?php echo e(url('/edit_child', $crianca->ID)); ?>" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo method_field('PUT'); ?>


                                        <section id="hide_section" >
                                            <article>
                                             <div class="btn func">1. Equipe Técnica Responsável pelo Acolhimento</div>

                                             <div class="row">

                                                 <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Conselho Tutelar</label><br>
                                                        <select name="ACMT_CONSELHO" class="form-control">
                                                            <option value="<?php echo e($acmt->ACMT_CONSELHO); ?>"><?php echo e($acmt->ACMT_CONSELHO); ?></option>
                                                            <?php $__currentLoopData = $conselhos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conselho): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($conselho->COTL_NOME); ?>"><?php echo e($conselho->COTL_NOME); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Conselheiro Responsável</label><br>
                                                        <input type="text" class="form-control" value="<?php echo e($acmt->ACMT_CONSELHEIRO); ?>" name="ACMT_CONSELHEIRO">
                                                    </div>
                                                </div> 
                                            </div>
                                        </article>
                                    </section><br>

                                    <section id="hide_section" >
                                        <article>
                                         <div class="btn func">2. Identificação da Criança ou Adolescente</div>

                                         <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Nome da Criança</label>
                                                    <input type="text" class="form-control" placeholder="Nome da criança" name="CRIA_NOME" value="<?php echo e($crianca->CRIA_NOME); ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Estado</label><br>
                                                    <select name="FK_CRIA_ESTD" id="state_city" class="form-control state_city">                                                        
                                                        <option value="<?php echo e($crianca->FK_CRIA_ESTD); ?>"><?php echo e($crianca->FK_CRIA_ESTD); ?></option>
                                                        <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($state->ESTD_UF); ?>"><?php echo e($state->ESTD_DESC); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Cidade</label><br>
                                                    <select name="FK_CRIA_CIDADE" id="city_state" class="form-control city_state">                                                        
                                                        <option value="<?php echo e($crianca->FK_CRIA_CIDADE); ?>"><?php echo e($crianca->FK_CRIA_CIDADE); ?></option>
                                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($city->CIDADE_DESC); ?>"><?php echo e($city->CIDADE_DESC); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row">

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Data de Nascimento</label>
                                                    <input type="date" class="form-control"  name="CRIA_DTA_NASC" value="<?php echo e($crianca->CRIA_DTA_NASC); ?>">
                                                </div>    
                                            </div>
                                            <div class="col-md-1 input_number">
                                                <div class="form-group">
                                                    <label>Idade</label>
                                                    <input type="number" class="form-control" placeholder="00" name="CRIA_IDADE_EST" value="<?php echo e($crianca->CRIA_IDADE_EST); ?>">                                                
                                                </div>    
                                            </div>
                                        </div>  
                                        
                                        <div class="row">

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Certidão de Nascimento</label>
                                                    <input type="number" class="form-control" placeholder="Nº Certidão" name="CRIA_CERT_NUM" value="<?php echo e($crianca->CRIA_CERT_NUM); ?>">
                                                </div>
                                            </div>                                        
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Livro</label>
                                                    <input type="text" class="form-control" placeholder="Livro" name="CRIA_CERT_LIVR" value="<?php echo e($crianca->CRIA_CERT_LIVR); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Folha</label>
                                                    <input type="text" class="form-control" placeholder="Folha" name="CRIA_CERT_FOLH" value="<?php echo e($crianca->CRIA_CERT_FOLH); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Raça/Cor</label><br>
                                                    <select name="FK_RACA_ID" class="form-control">                                                    
                                                        <option value="<?php echo e($raca_crianca->RACA_ID); ?>"><?php echo e($raca_crianca->RACA_DESCRICAO); ?></option>
                                                        <?php $__currentLoopData = $racas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $raca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($raca->RACA_ID); ?>"><?php echo e($raca->RACA_DESCRICAO); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">       

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Sexo</label><br/>                           
                                                    <div class="row">            
                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                        <?php if($crianca->CRIA_SEXO == 'M'): ?>
                                                        <label class="radio-inline"><input type="radio" name="CRIA_SEXO" value="M" checked/>Masculino</label>
                                                        <label class="radio-inline"><input type="radio" name="CRIA_SEXO" value="F" />Feminino</label>
                                                        <?php else: ?>
                                                        <label class="radio-inline"><input type="radio" name="CRIA_SEXO" value="M"/>Masculino</label>
                                                        <label class="radio-inline"><input type="radio" name="CRIA_SEXO" value="F" checked/>Feminino</label>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </section><br>
                                <section id="hide_section" >
                                 <article>
                                     <div class="btn func">3. Situação de Acolhimento</div>

                                     <div class="row"> 
                                        <div class="col-md-4">
                                            <div class="form-group">                                                
                                                <label>Foro Vara da Infância e Juventude foi comunicado no prazo de 24 horas?</label><br/> 

                                                <?php if($acmt->ACMT_VARA_INFAN == 1): ?>
                                                <label class="radio-inline"><input type="radio" name="ACMT_VARA_INFAN" value="1" checked/>Sim</label>
                                                <label class="radio-inline"><input type="radio" name="ACMT_VARA_INFAN" value="0" />Não</label>
                                                <?php else: ?>
                                                <label class="radio-inline"><input type="radio" name="ACMT_VARA_INFAN" value="1"/>Sim</label>
                                                <label class="radio-inline"><input type="radio" name="ACMT_VARA_INFAN" value="0" checked/>Não</label>
                                                <?php endif; ?>  

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Data Acolhimento</label><br>
                                                <input type="date" class="form-control"  name="ACMT_DTA_ACOLHI" value="<?php echo e($acmt->ACMT_DTA_ACOLHI); ?>"> 
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Meio de Chegada</label><br>
                                                <select name="FK_QEPI_ID[]" class="form-control col-md-2">                                                    
                                                    <option value="<?php echo e($meio_de_chegada->QEPI_ID); ?>"><?php echo e($meio_de_chegada->QEPI_DESCRICAO); ?></option> 
                                                    <?php $__currentLoopData = $qpis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qpi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($qpi->FK_QESP_ID == 1 && $qpi->QEPI_SIT == 1): ?>
                                                    <option value="<?php echo e($qpi->QEPI_ID); ?>"><?php echo e($qpi->QEPI_DESCRICAO); ?></option>
                                                    <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>O foro/vara da Infância e Juventude confirmou a medida de acolhimento, expediu guia e encaminhou todos os relatórios necessários?</label><br/>
                                                <?php if($acmt->ACMT_VARA_RELAT == 1): ?>
                                                <label class="radio-inline"><input type="radio" name="ACMT_VARA_RELAT" value="1" checked/>Sim</label>
                                                <label class="radio-inline"><input type="radio" name="ACMT_VARA_RELAT" value="0"/>Não</label>
                                                <?php else: ?>
                                                <label class="radio-inline"><input type="radio" name="ACMT_VARA_RELAT" value="1"/>Sim</label>
                                                <label class="radio-inline"><input type="radio" name="ACMT_VARA_RELAT" value="0" checked/>Não</label>
                                                <?php endif; ?> 
                                            </div>
                                        </div>

                                    </div> 

                                    <div class="row">

                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Sugestões</label><br/>
                                                <textarea class="col-md-10" name="ACMT_VARA_OBS" id="campo_sugestoes"><?php echo e($acmt->ACMT_VARA_OBS); ?></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row"> 

                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Há proximidade entre o serviço de acolhimento e a residência dos pais/responsável legal?</label><br/>
                                                <?php if($acmt->ACMT_PROX_RESIDENCIA == 1): ?>
                                                <label class="radio-inline"><input type="radio" name="ACMT_PROX_RESIDENCIA" value="1" checked/>Sim</label>
                                                <label class="radio-inline"><input type="radio" name="ACMT_PROX_RESIDENCIA" value="0"/>Não</label>
                                                <?php else: ?>
                                                <label class="radio-inline"><input type="radio" name="ACMT_PROX_RESIDENCIA" value="1"/>Sim</label>
                                                <label class="radio-inline"><input type="radio" name="ACMT_PROX_RESIDENCIA" value="0" checked/>Não</label>
                                                <?php endif; ?> 
                                            </div>
                                        </div> 

                                    </div> 

                                    <div class="row">

                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Acolhimentos anteriores?</label><br/>
                                                <?php if($acmt->ACMT_ACOLH_ANT == 1): ?>
                                                <label class="radio-inline"><input type="radio" name="ACMT_ACOLH_ANT" value="1" checked/>Sim</label>
                                                <label class="radio-inline"><input type="radio" name="ACMT_ACOLH_ANT" value="0"/>Não</label>
                                                <?php else: ?>
                                                <label class="radio-inline"><input type="radio" name="ACMT_ACOLH_ANT" value="1"/>Sim</label>
                                                <label class="radio-inline"><input type="radio" name="ACMT_ACOLH_ANT" value="0" checked/>Não</label>
                                                <?php endif; ?>  
                                            </div>
                                        </div> 

                                    </div>

                                    <div class="row">

                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Motivos e tempo de permanência no(s) serviço(s) de acolhimento(s) anterior(es)</label><br/>
                                                <textarea class="col-md-10" name="ACMT_MOT_ACOLHM_ANT"><?php echo e($acmt->ACMT_MOT_ACOLHM_ANT); ?></textarea>
                                            </div>
                                        </div>

                                    </div> 

                                    <div class="row">

                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Higiene/Sinais de Violência</label><br/>
                                                <textarea class="col-md-10" name="ACMT_HIG_VIOLENCIA"><?php echo e($acmt->ACMT_HIG_VIOLENCIA); ?></textarea>
                                            </div>
                                        </div>

                                    </div> 

                                    <div class="row">

                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Reações e Comportamento</label><br/>
                                                <textarea class="col-md-10" name="ACMT_REA_COMP"><?php echo e($acmt->ACMT_REA_COMP); ?></textarea>
                                            </div>
                                        </div>

                                    </div>
                                </article>
                            </section><br>

                            <section id="hide_section" >
                                <article>
                                    <div class="btn func">4. Situação Jurídica</div>   

                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Número do processo no Foro/Vara da Infância e Juventude</label>
                                                <input type="number" class="form-control" placeholder="Nº processo" name="ACMT_VARA_NUM_PROCESS" value="<?php echo e($acmt->ACMT_VARA_NUM_PROCESS); ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Proibição judicial de visitas</label><br>
                                                <select name="FK_QEPI_ID[]" class="form-control col-md-2">
                                                    <option value="<?php echo e($proibicao_judicial->QEPI_ID); ?>"><?php echo e($proibicao_judicial->QEPI_DESCRICAO); ?></option>
                                                    <?php $__currentLoopData = $qpis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qpi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($qpi->FK_QESP_ID == 2 && $qpi->QEPI_SIT == 1): ?>
                                                    <option value="<?php echo e($qpi->QEPI_ID); ?>"><?php echo e($qpi->QEPI_DESCRICAO); ?></option>
                                                    <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Situação do poder familiar</label><br>
                                                <select name="FK_QEPI_ID[]" class="form-control col-md-2">
                                                    <option value="<?php echo e($situacao_poder_familiar->QEPI_ID); ?>"><?php echo e($situacao_poder_familiar->QEPI_DESCRICAO); ?></option>
                                                    <?php $__currentLoopData = $qpis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qpi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($qpi->FK_QESP_ID == 3 && $qpi->QEPI_SIT == 1): ?>
                                                    <option value="<?php echo e($qpi->QEPI_ID); ?>"><?php echo e($qpi->QEPI_DESCRICAO); ?></option>
                                                    <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                    </div>

                                    <div class="row">

                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>A criança e/ou adolescente conta com defensor público/advogado?</label><br/>
                                                <?php if($acmt->ACMT_DFPUB == 1): ?>
                                                <label class="radio-inline"><input type="radio" name="ACMT_DFPUB" value="1" checked/>Sim</label>
                                                <label class="radio-inline"><input type="radio" name="ACMT_DFPUB" value="0"/>Não</label>
                                                <?php else: ?>
                                                <label class="radio-inline"><input type="radio" name="ACMT_DFPUB" value="1"/>Sim</label>
                                                <label class="radio-inline"><input type="radio" name="ACMT_DFPUB" value="0" checked/>Não</label>
                                                <?php endif; ?> 
                                            </div>
                                        </div>  
                                    </div>

                                    <div class="row">

                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>A família conta com defensor público/advogado?</label><br/>
                                                <?php if($acmt->ACMT_DFPUB_FAM == 1): ?>
                                                <label class="radio-inline"><input type="radio" name="ACMT_DFPUB_FAM" value="1" checked/>Sim</label>
                                                <label class="radio-inline"><input type="radio" name="ACMT_DFPUB_FAM" value="0"/>Não</label>
                                                <?php else: ?>
                                                <label class="radio-inline"><input type="radio" name="ACMT_DFPUB_FAM" value="1"/>Sim</label>
                                                <label class="radio-inline"><input type="radio" name="ACMT_DFPUB_FAM" value="0" checked/>Não</label>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </section><br>

                            <section id="hide_section" >
                                <article>
                                 <div class="btn func">5. Grupo de irmãos</div>                            

                                 <?php for($i=0; $i<$qt_cria_ext; $i++): ?>
                                 <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nome da Criança Externa: <?php echo e($i+1); ?></label>
                                            <input type="text" class="form-control" name="CRIA_EXTR_NOME[]" value="<?php echo e($criancas_externas[$i]->CRIA_EXTR_NOME); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nome do Responsável</label>
                                            <input type="text" class="form-control" name="CRIA_EXTR_FAM_NOME[]" value="<?php echo e($criancas_externas[$i]->CRIA_EXTR_FAM_NOME); ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nome da Instituição de Acolhimento</label>
                                            <input type="text" class="form-control" name="CRIA_EXTR_NOME_INSTI[]" value="<?php echo e($criancas_externas[$i]->CRIA_EXTR_NOME_INSTI); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Endereço da(s) instituição(ões)</label>
                                            <input type="text" class="form-control" name="CRIA_EXTR_END_INSTI[]" value="<?php echo e($criancas_externas[$i]->CRIA_EXTR_END_INSTI); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Data de Nascimento</label>
                                            <input type="date" class="form-control"  name="CRIA_EXTR_DATA_NASC[]" value="<?php echo e($criancas_externas[$i]->CRIA_EXTR_DATA_NASC); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Contato</label>
                                            <input type="number" class="form-control" name="CRIA_EXTR_FAM_CONT[]" value="<?php echo e($criancas_externas[$i]->CRIA_EXTR_FAM_CONT); ?>">
                                        </div>
                                    </div>
                                </div>
                                <hr style="height: 10px;  border: 0;  box-shadow: 0 10px 10px -10px #8c8b8b inset;"> <br>
                                <?php endfor; ?>
                            </article>
                        </section><br>
                        <section id="hide_section" >
                            <article>
                                <div class="btn func">6. Motivos do acolhimento institucional ou familiar</div>
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">  
                                            <label>Falta de recursos materias por parte dos pais e/ou responsáveis</label>  
                                            <div class="row">
                                                <div class="col-md-5">  
                                                    <ul>
                                                        <?php
                                                        $flag = 0;
                                                        $question = 4;
                                                        $pos = $question - 1;
                                                        $dividir = $apis_array[$pos] % 2 == 0 ? $apis_array[$pos]/2 : ($apis_array[$pos]/2) + 0.5;
                                                        ?>
                                                        <?php $__currentLoopData = $qpis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qpi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php $cont_repeticao=0; ?>

                                                        <?php if($qpi->FK_QESP_ID == $question && $qpi->QEPI_SIT == 1): ?>
                                                        <?php $flag = $flag + 1; ?>

                                                        <li style="list-style-type:none;">    
                                                            <?php for($i=0; $i<$qt_falta_recurso_resp ; $i++): ?>                                                                    
                                                            <?php if($qpi->QEPI_ID == $falta_recurso_resp[$i]->QEPI_ID ): ?>
                                                            <li style="list-style-type:none;">          
                                                                <label class="checkbox-inline"><input type="checkbox" name="FK_QEPI_ID[]" value="<?php echo e($qpi->QEPI_ID); ?>" checked/><?php echo e($qpi->QEPI_DESCRICAO); ?></label>
                                                            </li>
                                                            <?php $cont_repeticao++; ?>  

                                                            <?php endif; ?>
                                                            <?php endfor; ?>
                                                            <?php if($cont_repeticao==0): ?>    
                                                            <label class="checkbox-inline"><input type="checkbox"  name="FK_QEPI_ID[]" value="<?php echo e($qpi->QEPI_ID); ?>"/><?php echo e($qpi->QEPI_DESCRICAO); ?></label>
                                                            <?php endif; ?>
                                                        </li>
                                                        <?php if($flag == $dividir): ?>
                                                    </ul>    
                                                </div>  

                                                <div class="col-md-6">
                                                    <ul>
                                                        <?php endif; ?>
                                                        <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>    
                                                </div> 

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">  
                                            <label>Orfandade ou abandono, sem identificação de família extensa ou pessoas significativas da rede de apoio</label> 
                                            <div class="row">
                                               <div class="col-md-5">  
                                                <ul>
                                                    <?php
                                                    $flag = 0;
                                                    $question = 5;
                                                    $pos = $question - 1;
                                                    $dividir = $apis_array[$pos] % 2 == 0 ? $apis_array[$pos]/2 : ($apis_array[$pos]/2) + 0.5;
                                                    ?>
                                                    <?php $__currentLoopData = $qpis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qpi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $cont_repeticao=0; ?>

                                                    <?php if($qpi->FK_QESP_ID == $question && $qpi->QEPI_SIT == 1): ?>
                                                    <?php $flag = $flag + 1; ?>

                                                    <li style="list-style-type:none;">    
                                                        <?php for($i=0; $i<$qt_tipo_orfn_aband ; $i++): ?>                                                                    
                                                        <?php if($qpi->QEPI_ID == $tipo_orfn_aband[$i]->QEPI_ID ): ?>
                                                        <li style="list-style-type:none;">          
                                                            <label class="checkbox-inline"><input type="checkbox" name="FK_QEPI_ID[]" value="<?php echo e($qpi->QEPI_ID); ?>" checked/><?php echo e($qpi->QEPI_DESCRICAO); ?></label>
                                                        </li>
                                                        <?php $cont_repeticao++; ?>  

                                                        <?php endif; ?>
                                                        <?php endfor; ?>
                                                        <?php if($cont_repeticao==0): ?>    
                                                        <label class="checkbox-inline"><input type="checkbox"  name="FK_QEPI_ID[]" value="<?php echo e($qpi->QEPI_ID); ?>"/><?php echo e($qpi->QEPI_DESCRICAO); ?></label>
                                                        <?php endif; ?>
                                                    </li>
                                                    <?php if($flag == $dividir): ?>
                                                </ul>    
                                            </div>  

                                            <div class="col-md-6">
                                                <ul>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>    
                                            </div>                                                             
                                        </div> 
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-11">
                                    <div class="form-group">  
                                        <label>Ausência temporária de pais e/ou responsáveis, sem identificação de família extensa ou pessoas significativas da rede social de apoio</label> 
                                        <div class="row">
                                            <div class="col-md-5">  
                                                <ul>
                                                    <?php
                                                    $flag = 0;
                                                    $question = 6;
                                                    $pos = $question - 1;
                                                    $dividir = $apis_array[$pos] % 2 == 0 ? $apis_array[$pos]/2 : ($apis_array[$pos]/2) + 0.5;
                                                    ?>
                                                    <?php $__currentLoopData = $qpis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qpi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $cont_repeticao=0; ?>

                                                    <?php if($qpi->FK_QESP_ID == $question && $qpi->QEPI_SIT == 1): ?>
                                                    <?php $flag = $flag + 1; ?>

                                                    <li style="list-style-type:none;">    
                                                        <?php for($i=0; $i<$qt_ausencia_temp_resp; $i++): ?>                                                                    
                                                        <?php if($qpi->QEPI_ID == $ausencia_temp_resp[$i]->QEPI_ID ): ?>
                                                        <li style="list-style-type:none;">          
                                                            <label class="checkbox-inline"><input type="checkbox" name="FK_QEPI_ID[]" value="<?php echo e($qpi->QEPI_ID); ?>" checked/><?php echo e($qpi->QEPI_DESCRICAO); ?></label>
                                                        </li>
                                                        <?php $cont_repeticao++; ?>  

                                                        <?php endif; ?>
                                                        <?php endfor; ?>
                                                        <?php if($cont_repeticao==0): ?>    
                                                        <label class="checkbox-inline"><input type="checkbox"  name="FK_QEPI_ID[]" value="<?php echo e($qpi->QEPI_ID); ?>"/><?php echo e($qpi->QEPI_DESCRICAO); ?></label>
                                                        <?php endif; ?>
                                                    </li>
                                                    <?php if($flag == $dividir): ?>
                                                </ul>    
                                            </div>  

                                            <div class="col-md-6">
                                                <ul>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>    
                                            </div>                                                               
                                        </div> 
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-11">
                                    <div class="form-group">  
                                        <label>Condições desfavoráveis dos pais e/ou responsáveis para cuidar do(s) dos filho(s)</label> 
                                        <div class="row">
                                            <div class="col-md-5">  
                                                <ul>
                                                    <?php
                                                    $flag = 0;
                                                    $question = 7;
                                                    $pos = $question - 1;
                                                    $dividir = $apis_array[$pos] % 2 == 0 ? $apis_array[$pos]/2 : ($apis_array[$pos]/2) + 0.5;
                                                    ?>
                                                    <?php $__currentLoopData = $qpis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qpi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $cont_repeticao=0; ?>

                                                    <?php if($qpi->FK_QESP_ID == $question && $qpi->QEPI_SIT == 1): ?>
                                                    <?php $flag = $flag + 1; ?>

                                                    <li style="list-style-type:none;">    
                                                        <?php for($i=0; $i<$qt_cond_desfa_resp; $i++): ?>                                                                    
                                                        <?php if($qpi->QEPI_ID == $cond_desfa_resp[$i]->QEPI_ID ): ?>
                                                        <li style="list-style-type:none;">          
                                                            <label class="checkbox-inline"><input type="checkbox" name="FK_QEPI_ID[]" value="<?php echo e($qpi->QEPI_ID); ?>" checked/><?php echo e($qpi->QEPI_DESCRICAO); ?></label>
                                                        </li>
                                                        <?php $cont_repeticao++; ?>  

                                                        <?php endif; ?>
                                                        <?php endfor; ?>
                                                        <?php if($cont_repeticao==0): ?>    
                                                        <label class="checkbox-inline"><input type="checkbox"  name="FK_QEPI_ID[]" value="<?php echo e($qpi->QEPI_ID); ?>"/><?php echo e($qpi->QEPI_DESCRICAO); ?></label>
                                                        <?php endif; ?>
                                                    </li>
                                                    <?php if($flag == $dividir): ?>
                                                </ul>    
                                            </div>  

                                            <div class="col-md-6">
                                                <ul>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>    
                                            </div>                                                            
                                        </div> 
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-11">
                                    <div class="form-group">  
                                        <label>Situação das crianças e dos adolescentes</label> 
                                        <div class="row">
                                            <div class="col-md-5">  
                                                <ul>
                                                    <?php
                                                    $flag = 0;
                                                    $question = 9;
                                                    $pos = $question - 1;
                                                    $dividir = $apis_array[$pos] % 2 == 0 ? $apis_array[$pos]/2 : ($apis_array[$pos]/2) + 0.5;
                                                    ?>
                                                    <?php $__currentLoopData = $qpis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qpi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $cont_repeticao=0; ?>

                                                    <?php if($qpi->FK_QESP_ID == $question && $qpi->QEPI_SIT == 1): ?>
                                                    <?php $flag = $flag + 1; ?>

                                                    <li style="list-style-type:none;">    
                                                        <?php for($i=0; $i<$qt_crian_adoles_sit; $i++): ?>                                                                    
                                                        <?php if($qpi->QEPI_ID == $crian_adoles_sit[$i]->QEPI_ID ): ?>
                                                        <li style="list-style-type:none;">          
                                                            <label class="checkbox-inline"><input type="checkbox" name="FK_QEPI_ID[]" value="<?php echo e($qpi->QEPI_ID); ?>" checked/><?php echo e($qpi->QEPI_DESCRICAO); ?></label>
                                                        </li>
                                                        <?php $cont_repeticao++; ?>  

                                                        <?php endif; ?>
                                                        <?php endfor; ?>
                                                        <?php if($cont_repeticao==0): ?>    
                                                        <label class="checkbox-inline"><input type="checkbox"  name="FK_QEPI_ID[]" value="<?php echo e($qpi->QEPI_ID); ?>"/><?php echo e($qpi->QEPI_DESCRICAO); ?></label>
                                                        <?php endif; ?>
                                                    </li>
                                                    <?php if($flag == $dividir): ?>
                                                </ul>    
                                            </div>  

                                            <div class="col-md-6">
                                                <ul>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>    
                                            </div>                                                             
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </article>
                    </section><br>

                    <section id="hide_section" >
                        <article style="padding-left: 15px;">
                            <div class="btn func">8. Educação</div>

                            <div class="row"> 

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Ano escolar atual</label><br>
                                        <select name="ACMT_ANO_ESCO"  class="form-control col-md-2">
                                            <option value="<?php echo e($acmt->ACMT_ANO_ESCO); ?>"><?php echo e($acmt->ACMT_ANO_ESCO); ?></option>
                                            <option value="Creche">Creche</option>
                                            <option value="Pre-escola">Pré-escola</option>
                                            <option value="Ensino Fundamental">Ensino Fundamental</option>
                                            <option value="Ensino Medio">Ensino Médio</option>
                                            <option value="Nao frequenta">Não frequenta escola/creche</option>
                                            <option value="Sem informacoes">Sem informações</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Frequência</label><br>
                                        <select name="ACMT_FREQ_ESC"  class="form-control col-md-2">
                                            <option value="<?php echo e($acmt->ACMT_FREQ_ESC); ?>"><?php echo e($acmt->ACMT_FREQ_ESC); ?></option>
                                            <option value="Satisfatorio">Satisfátoria</option>
                                            <option value="Insatisfatoria">Insatisfatória</option>
                                            <option value="Sem informacao">Sem Informação</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Rendimento Escolar</label><br>
                                        <select name="ACMT_REND_ESC"  class="form-control col-md-2">
                                            <option value="<?php echo e($acmt->ACMT_REND_ESC); ?>"><?php echo e($acmt->ACMT_REND_ESC); ?></option>
                                            <option value="Satisfatorio">Satisfátoria</option>
                                            <option value="Insatisfatoria">Insatisfatória</option>
                                            <option value="Sem informacao">Sem Informação</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Como a criança percebe ou vivencia sua relação com a escola?</label><br/>
                                        <textarea class="col-md-10" name="ACMT_VIV_REL_ESC"><?php echo e($acmt->ACMT_VIV_REL_ESC); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </section><br>

                        <section id="hide_section" >
                        <article style="padding-left: 15px;">
                            <div class="btn func">9. Saúde</div>

                            <div class="row">

                             <div class="col-md-2">
                                <div class="form-group">
                                    <label>Carteira de vacinação</label><br>
                                    <select name="CSAU_CART_VAC"  class="form-control col-md-2">
                                        <option value="<?php echo e($cria_saude->CSAU_CART_VAC); ?>"><?php echo e($cria_saude->CSAU_CART_VAC); ?></option>
                                        <option value="Sim, atualizada (SA)">Sim, atualizada (SA)</option>
                                        <option value="Sim, desatualizada (SD)">Sim, desatualizada (SD)</option>
                                        <option value="Não possui (NP)">Não possui (NP)</option>
                                    </select>
                                </div>
                            </div> 

                            <div class="col-md-11">
                                <div class="form-group">  
                                    <label>Problemas de saúde física e mental</label><br>
                                    <div class="col-md-5">  
                                        <ul>
                                            <?php
                                            $flag = 0;
                                            $question = 10;
                                            $pos = $question - 1;
                                            $dividir = $apis_array[$pos] % 2 == 0 ? $apis_array[$pos]/2 : ($apis_array[$pos]/2) + 0.5;
                                            ?>
                                            <?php $__currentLoopData = $qpis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qpi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $cont_repeticao=0; ?>

                                            <?php if($qpi->FK_QESP_ID == $question && $qpi->QEPI_SIT == 1): ?>
                                            <?php $flag = $flag + 1; ?>

                                            <li style="list-style-type:none;">    
                                                <?php for($i=0; $i<$qt_prob_saude; $i++): ?>                                                                    
                                                <?php if($qpi->QEPI_ID == $prob_saude[$i]->QEPI_ID ): ?>
                                                <li style="list-style-type:none;">          
                                                    <label class="checkbox-inline"><input type="checkbox" name="FK_QEPI_ID[]" value="<?php echo e($qpi->QEPI_ID); ?>" checked/><?php echo e($qpi->QEPI_DESCRICAO); ?></label>
                                                </li>
                                                <?php $cont_repeticao++; ?>  

                                                <?php endif; ?>
                                                <?php endfor; ?>
                                                <?php if($cont_repeticao==0): ?>    
                                                <label class="checkbox-inline"><input type="checkbox"  name="FK_QEPI_ID[]" value="<?php echo e($qpi->QEPI_ID); ?>"/><?php echo e($qpi->QEPI_DESCRICAO); ?></label>
                                                <?php endif; ?>
                                            </li>
                                            <?php if($flag == $dividir): ?>
                                        </ul>    
                                    </div>  

                                    <div class="col-md-6">
                                        <ul>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>    
                                    </div> 

                                </div>    
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Especificar o diagnóstico e a data de sua realização</label><br/>
                                    <textarea class="col-md-10" name="CSAU_DIAG_MED"><?php echo e($cria_saude->CSAU_DIAG_MED); ?></textarea>
                                </div>
                            </div> 

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Data da Realização</label>
                                    <input type="date" class="form-control" name="CSAU_DTA_DIAG_MED" value="<?php echo e($cria_saude->CSAU_DTA_DIAG_MED); ?>">
                                </div>    
                            </div> 
                        </div>


                        <div class="row">
                            <div class="col-md-11">
                                <div class="form-group">  
                                    <label>Problemas de saúde física e mental</label><br>
                                    <div class="col-md-5">  
                                        <ul>
                                            <?php
                                            $flag = 0;
                                            $question = 17;
                                            $pos = $question - 1;
                                            $dividir = $apis_array[$pos] % 2 == 0 ? $apis_array[$pos]/2 : ($apis_array[$pos]/2) + 0.5;
                                            ?>
                                            <?php $__currentLoopData = $qpis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qpi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $cont_repeticao=0; ?>

                                            <?php if($qpi->FK_QESP_ID == $question && $qpi->QEPI_SIT == 1): ?>
                                            <?php $flag = $flag + 1; ?>

                                            <li style="list-style-type:none;">    
                                                <?php for($i=0; $i<$qt_prob_saude2; $i++): ?>                                                                    
                                                <?php if($qpi->QEPI_ID == $prob_saude2[$i]->QEPI_ID ): ?>
                                                <li style="list-style-type:none;">          
                                                    <label class="checkbox-inline"><input type="checkbox" name="FK_QEPI_ID[]" value="<?php echo e($qpi->QEPI_ID); ?>" checked/><?php echo e($qpi->QEPI_DESCRICAO); ?></label>
                                                </li>
                                                <?php $cont_repeticao++; ?>  

                                                <?php endif; ?>
                                                <?php endfor; ?>
                                                <?php if($cont_repeticao==0): ?>    
                                                <label class="checkbox-inline"><input type="checkbox"  name="FK_QEPI_ID[]" value="<?php echo e($qpi->QEPI_ID); ?>"/><?php echo e($qpi->QEPI_DESCRICAO); ?></label>
                                                <?php endif; ?>
                                            </li>
                                            <?php if($flag == $dividir): ?>
                                        </ul>    
                                    </div>  

                                    <div class="col-md-6">
                                        <ul>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>    
                                    </div>  

                                </div>    
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Acompanhamentos médicos necessários</label><br/>
                                    <textarea class="col-md-10" name="CSAU_ACOP_MED"><?php echo e($cria_saude->CSAU_ACOP_MED); ?></textarea>
                                </div>
                            </div>  
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Uso contínuo de medicação?</label><br/>
                                    <?php if($cria_saude->CSAU_USO_MED == 1): ?>
                                    <label class="radio-inline"><input type="radio" name="CSAU_USO_MED" value="1" checked/>Sim</label>
                                    <label class="radio-inline"><input type="radio" name="CSAU_USO_MED" value="0"/>Não</label>
                                    <?php else: ?>
                                    <label class="radio-inline"><input type="radio" name="CSAU_USO_MED" value="1"/>Sim</label>
                                    <label class="radio-inline"><input type="radio" name="CSAU_USO_MED" value="0" checked/>Não</label>
                                    <?php endif; ?>
                                </div>
                            </div>  
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Quais?</label><br/>
                                    <textarea class="col-md-10" name="CSAU_USO_MED_ESP"><?php echo e($cria_saude->CSAU_USO_MED_ESP); ?></textarea>
                                </div>
                            </div>  
                        </div>
                    </article>
                </section><br>

                    <section id="hide_section" >
                        <article style="padding-left: 15px;">
                            <div class="btn func">10. Autonomia da criança, do adolescente e do jovem</div>

                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Teve acesso a informações sobre sua história de vida, familiar e motivos de acolhimento; considerando-se o grau de desenvolvimento?</label><br/>
                                        <?php if($acmt->ACMT_HIST_FAMI == 1): ?>
                                        <label class="radio-inline"><input type="radio" name="ACMT_HIST_FAMI" value="1" checked/>Sim</label>
                                        <label class="radio-inline"><input type="radio" name="ACMT_HIST_FAMI" value="0"/>Não</label>
                                        <?php else: ?>
                                        <label class="radio-inline"><input type="radio" name="ACMT_HIST_FAMI" value="1"/>Sim</label>
                                        <label class="radio-inline"><input type="radio" name="ACMT_HIST_FAMI" value="0" checked/>Não</label>
                                        <?php endif; ?>
                                    </div>
                                </div>  
                            </div>

                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Se não, Por quê?</label><br/>
                                        <textarea class="col-md-10" name="ACMT_HIST_FAMI_DES"><?php echo e($acmt->ACMT_HIST_FAMI_DES); ?></textarea>
                                    </div>
                                </div>  
                            </div>

                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Emite sua opinião quanto às decisões que dizem respeito à sua vida cotidiana no serviço de acolhimento e à sua situação familiar?</label><br/>
                                        <?php if($acmt->ACMT_OPIN_DECI  == 1): ?>
                                        <label class="radio-inline"><input type="radio" name="ACMT_OPIN_DECI" value="1" checked/>Sim</label>
                                        <label class="radio-inline"><input type="radio" name="ACMT_OPIN_DECI" value="0"/>Não</label>
                                        <?php else: ?>
                                        <label class="radio-inline"><input type="radio" name="ACMT_OPIN_DECI" value="1"/>Sim</label>
                                        <label class="radio-inline"><input type="radio" name="ACMT_OPIN_DECI" value="0" checked/>Não</label>
                                        <?php endif; ?>
                                    </div>
                                </div>  
                            </div>


                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Quais?</label><br/>
                                        <textarea class="col-md-10" name="ACMT_OPIN_DEC_DES"><?php echo e($acmt->ACMT_OPIN_DEC_DES); ?></textarea>
                                    </div>
                                </div>  
                            </div>

                            <div class="row">
                                <div class="col-md-11">
                                    <div class="form-group">  
                                        <label>Sua opinião reflete sua preferência em:</label>  
                                        <div class="row">
                                         <div class="col-md-5">  
                                            <ul>
                                                <?php
                                                $flag = 0;
                                                $question = 12;
                                                $pos = $question - 1;
                                                $dividir = $apis_array[$pos] % 2 == 0 ? $apis_array[$pos]/2 : ($apis_array[$pos]/2) + 0.5;
                                                ?>
                                                <?php $__currentLoopData = $qpis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qpi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $cont_repeticao=0; ?>

                                                <?php if($qpi->FK_QESP_ID == $question && $qpi->QEPI_SIT == 1): ?>
                                                <?php $flag = $flag + 1; ?>

                                                <li style="list-style-type:none;">    
                                                    <?php for($i=0; $i<$qt_opiniao_vida; $i++): ?>                                                                    
                                                    <?php if($qpi->QEPI_ID == $opiniao_vida[$i]->QEPI_ID ): ?>
                                                    <li style="list-style-type:none;">          
                                                        <label class="checkbox-inline"><input type="checkbox" name="FK_QEPI_ID[]" value="<?php echo e($qpi->QEPI_ID); ?>" checked/><?php echo e($qpi->QEPI_DESCRICAO); ?></label>
                                                    </li>
                                                    <?php $cont_repeticao++; ?>  

                                                    <?php endif; ?>
                                                    <?php endfor; ?>
                                                    <?php if($cont_repeticao==0): ?>    
                                                    <label class="checkbox-inline"><input type="checkbox"  name="FK_QEPI_ID[]" value="<?php echo e($qpi->QEPI_ID); ?>"/><?php echo e($qpi->QEPI_DESCRICAO); ?></label>
                                                    <?php endif; ?>
                                                </li>
                                                <?php if($flag == $dividir): ?>
                                            </ul>    
                                        </div>  

                                        <div class="col-md-6">
                                            <ul>
                                                <?php endif; ?>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>    
                                        </div>                                                           
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </section><br>

                <section id="hide_section" >
                    <article style="padding-left: 15px;">
                        <div class="btn func">11. Observações</div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Desenvolvimento Físico</label><br/>
                                    <textarea class="col-md-10" name="ACMT_DESEN_FISIC"><?php echo e($acmt->ACMT_DESEN_FISIC); ?></textarea>
                                </div>
                            </div>  
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Desenvolvimento Cognitivo</label><br/>
                                    <textarea class="col-md-10" name="ACMT_DESEN_COGNI"><?php echo e($acmt->ACMT_DESEN_COGNI); ?></textarea>
                                </div>
                            </div>  
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Desenvolvimento Sócio Emocional</label><br/>
                                    <textarea class="col-md-10" name="ACMT_DESEN_SOCIO_EMO"><?php echo e($acmt->ACMT_DESEN_SOCIO_EMO); ?></textarea>
                                </div>
                            </div>  
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Vida Cotidiana</label><br/>
                                    <textarea class="col-md-10" name="ACMT_VDA_COT"><?php echo e($acmt->ACMT_VDA_COT); ?></textarea>
                                </div>
                            </div>  
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Outras Informações</label><br/>
                                    <textarea class="col-md-10" name="ACMT_OUT_INFO"><?php echo e($acmt->ACMT_OUT_INFO); ?></textarea>
                                </div>
                            </div>  
                        </div>
                    </article>
                </section><br>
<section id="hide_section" >
        <article style="padding-left: 15px;">
            <div class="btn func">12. Identificações dos Pais ou Responsáveis</div>

            <?php $j=0 //incremento para pegar cada grau de parentesco de cada responsável ?>
            <?php for($i=0; $i<$qt_crianca_resp; $i++): ?>

            <div class="row">         
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nome do Responsável</label>
                        <input type="text" class="form-control" name="RESP_NOME[]" value="<?php echo e($crianca_resp[$i]->RESP_NOME); ?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Grau de Parenteco</label><br>    
                        <select name="FK_GRPA_ID[]"  class="form-control col-md-2">
                            <option value="<?php echo e($grau_parentesco[$j]->GRPA_ID); ?>"><?php echo e($grau_parentesco[$j]->GRPA_NOME); ?></option>
                            <?php $__currentLoopData = $graus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grau): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($grau->GRPA_ID); ?>"><?php echo e($grau->GRPA_NOME); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        
                    </div>
                </div>

            </div>

            <div class="row"> 

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Estado</label><br>
                        <select name="FK_RESP_ESTD[]" id="state_city_resp" class="form-control state_city_resp">
                            <option value="<?php echo e($crianca_resp[$i]->FK_RESP_ESTD); ?>"><?php echo e($crianca_resp[$i]->FK_RESP_ESTD); ?></option>
                            <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($state->ESTD_UF); ?>"><?php echo e($state->ESTD_DESC); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Cidade</label><br>
                        <select name="FK_RESP_CIDADE[]" id="id_cidade" class="form-control city_state_resp">
                            <option value="<?php echo e($crianca_resp[$i]->FK_RESP_CIDADE); ?>"><?php echo e($crianca_resp[$i]->FK_RESP_CIDADE); ?></option>
                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($city->CIDADE_DESC); ?>"><?php echo e($city->CIDADE_DESC); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Endereço</label>
                        <input type="text" class="form-control" placeholder="Endereço" name="RESP_END_CSA[]" value="<?php echo e($crianca_resp[$i]->RESP_END_CSA); ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Bairro</label>
                        <input type="text" class="form-control" placeholder="Bairro" name="RESP_BAIRRO[]" value="<?php echo e($crianca_resp[$i]->RESP_BAIRRO); ?>">
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Data de Nascimento</label>
                        <input type="date" class="form-control"  name="RESP_DT_NASCI[]" value="<?php echo e($crianca_resp[$i]->RESP_DT_NASCI); ?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>RG</label>
                        <input type="number" class="form-control" placeholder="RG" name="RESP_RG[]" value="<?php echo e($crianca_resp[$i]->RESP_RG); ?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>CPF</label>
                        <input type="number" class="form-control" placeholder="CPF" name="RESP_CPF[]" value="<?php echo e($crianca_resp[$i]->RESP_CPF); ?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Contato</label>
                        <input type="number" class="form-control" placeholder="Contato" name="RESP_TEL[]" value="<?php echo e($crianca_resp[$i]->RESP_TEL); ?>">
                    </div>
                </div>

            </div>                                    

            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Ponto de Referência</label>
                        <input type="text" class="form-control" placeholder="Ponto de referência" name="RESP_PONT_REF[]" value="<?php echo e($crianca_resp[$i]->RESP_PONT_REF); ?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Profissão/trabalho</label>
                        <input type="text" class="form-control" placeholder="Profissão/Trabalho" name="RESP_PROF[]" value="<?php echo e($crianca_resp[$i]->RESP_PROF); ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Endereço do trabalho</label>
                        <input type="text" class="form-control" placeholder="Endereço do Trarbalho" name="RESP_END_TRAB[]" value="<?php echo e($crianca_resp[$i]->RESP_END_TRAB); ?>">
                    </div>
                </div>
            </div>  

            <div class="row" id="divResponsavelList">
            </div>
            <hr style="height: 10px;  border: 0;  box-shadow: 0 10px 10px -10px #8c8b8b inset;"> <br>
            <?php $j++ ?>
            <?php endfor; ?>
        </article>
    </section><br>

    <section id="hide_section" >
        <article style="padding-left: 15px;">
            <div class="btn func">13. Orientação Familiar - Tipo 1</div>

            <div class="row">
                <div class="col-md-11">
                    <div class="form-group">  
                        <label>OBS - Identificar em cada instituição ou serviço, o nome e telefone do profissional responsável.  Informe sobre quais as ações já foram executadas, se há continuidade no acompanhamento e a existência de pareceres, relatórios, etc. <br> <br> 
                            Quais instituições e os serviços que prestaram ou que estão prestando orientação ao grupo familiar?<br></label><br><br>

                            <?php if($orientacao_tipo_1->ORNT_CONS_TUT == 1): ?>
                            <label class="checkbox-inline"><input type="checkbox" name="ORNT_CONS_TUT" value="1" checked/>Conselho Tutelar</label><br>
                            <?php else: ?>
                            <label class="checkbox-inline"><input type="checkbox" name="ORNT_CONS_TUT" value="1"/>Conselho Tutelar</label><br>
                            <?php endif; ?>
                            <label>Observação</label>
                            <input type="text" class="form-control"  name="ORNT_CONS_TUT_OBS" value="<?php echo e($orientacao_tipo_1->ORNT_CONS_TUT_OBS); ?>"> <br>
                            

                            <?php if($orientacao_tipo_1->ORNT_DPCA == 1): ?>
                            <label class="checkbox-inline"><input type="checkbox" name="ORNT_DPCA" value="1" checked/>Delegacia de Proteção à Criança e ao Adolescente - DPCA</label><br>
                            <?php else: ?>
                            <label class="checkbox-inline"><input type="checkbox" name="ORNT_DPCA" value="1"/>Delegacia de Proteção à Criança e ao Adolescente - DPCA</label><br>
                            <?php endif; ?>
                            <label>Observação</label>
                            <input type="text" class="form-control"  name="ORNT_DPCA_OBS" value="<?php echo e($orientacao_tipo_1->ORNT_DPCA_OBS); ?>"><br>
                            

                            <?php if($orientacao_tipo_1->ORNT_DPCA == 1): ?>
                            <label class="checkbox-inline"><input type="checkbox" name="ORNT_DELEGACIA_COMUM" value="1" checked/>Delegacias comuns e especializadas</label><br>
                            <?php else: ?>
                            <label class="checkbox-inline"><input type="checkbox" name="ORNT_DELEGACIA_COMUM" value="1"/>Delegacias comuns e especializadas</label><br>
                            <?php endif; ?>
                            <label>Observação</label>
                            <input type="text" class="form-control"  name="DELEGACIA_COMUM_OBS" value="<?php echo e($orientacao_tipo_1->ORNT_DPCA_OBS); ?>"><br>
                            

                            <?php if($orientacao_tipo_1->ORNT_ASSISTENCIA_SOCIAL == 1): ?>
                            <label class="checkbox-inline"><input type="checkbox" name="ORNT_ASSISTENCIA_SOCIAL" value="1" checked/>Assitência Social</label><br>
                            <?php else: ?>
                            <label class="checkbox-inline"><input type="checkbox" name="ORNT_ASSISTENCIA_SOCIAL" value="1"/>Assitência Social</label><br>
                            <?php endif; ?>
                            <label>Observação</label>
                            <input type="text" class="form-control"  name="ORNT_ASSISTENCIA_SOCIAL_OBS" value="<?php echo e($orientacao_tipo_1->ORNT_ASSISTENCIA_SOCIAL_OBS); ?>"><br>
                            
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label>Proteção Social Básica</label><br/>
                            <textarea class="col-md-10" name="ORNT_PROTECAO_SOCIAL_BASICA"><?php echo e($orientacao_tipo_1->ORNT_PROTECAO_SOCIAL_BASICA); ?></textarea>
                        </div>
                    </div>  
                </div>

                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label>Proteção Social Especial</label><br/>
                            <textarea class="col-md-10" name="ORNT_PROTECAO_SOCIAL_ESPECIAL"><?php echo e($orientacao_tipo_1->ORNT_PROTECAO_SOCIAL_ESPECIAL); ?></textarea>
                        </div>
                    </div>  
                </div><br>

                <div class="row">
                    <div class="col-md-11">
                        <div class="form-group"> 

                            <?php if($orientacao_tipo_1->ORNT_OUTROS_SERVICOS == 1): ?>
                            <label class="checkbox-inline"><input type="checkbox" name=" ORNT_OUTROS_SERVICOS" value=" 1" checked/>Outros Serviços de apoio sócio-familiar</label><br>
                            <?php else: ?>
                            <label class="checkbox-inline"><input type="checkbox" name=" ORNT_OUTROS_SERVICOS" value=" 1"/>Outros Serviços de apoio sócio-familiar</label><br>
                            <?php endif; ?>
                            <label>Especifique</label>
                            <input type="text" class="form-control"  name="ORNT_OUTROS_SERVICOS_OBS" value="<?php echo e($orientacao_tipo_1->ORNT_OUTROS_SERVICOS_OBS); ?>"> <br>
                            

                            <?php if($orientacao_tipo_1->ORNT_SAUDE == 1): ?>
                            <label class="checkbox-inline"><input type="checkbox" name="ORNT_SAUDE" value="1" checked/>Saúde</label><br>
                            <?php else: ?>
                            <label class="checkbox-inline"><input type="checkbox" name="ORNT_SAUDE" value="1"/>Saúde</label><br>
                            <?php endif; ?>
                            <label>Especifique</label>
                            <input type="text" class="form-control"  name="ORNT_SAUDE_OBS" value="<?php echo e($orientacao_tipo_1->ORNT_SAUDE_OBS); ?>"><br>
                            

                            <?php if($orientacao_tipo_1->ORNT_EDUCACAO == 1): ?>
                            <label class="checkbox-inline"><input type="checkbox" name="ORNT_EDUCACAO" value="1" checked/>Educação</label><br>
                            <?php else: ?>
                            <label class="checkbox-inline"><input type="checkbox" name="ORNT_EDUCACAO" value="1"/>Educação</label><br>
                            <?php endif; ?>
                            <label>Especifique</label>
                            <input type="text" class="form-control"  name="ORNT_EDUCACAO_OBS" value="<?php echo e($orientacao_tipo_1->ORNT_EDUCACAO_OBS); ?>"><br>                            

                            <?php if($orientacao_tipo_1->ORNT_HABITACAO == 1): ?>
                            <label class="checkbox-inline"><input type="checkbox" name="ORNT_HABITACAO" value="1" checked/>Habitação</label><br>
                            <?php else: ?>
                            <label class="checkbox-inline"><input type="checkbox" name="ORNT_HABITACAO" value="1"/>Habitação</label><br>
                            <?php endif; ?>
                            <label>Especifique</label>
                            <input type="text" class="form-control"  name="ORNT_HABITACAO_OBS" value="<?php echo e($orientacao_tipo_1->ORNT_HABITACAO_OBS); ?>"><br>                            

                            <?php if($orientacao_tipo_1->ORNT_PROFISSIO_TRAB == 1): ?>
                            <label class="checkbox-inline"><input type="checkbox" name="ORNT_PROFISSIO_TRAB" value="1" checked/>Profissionalização/Trabalho</label><br>
                            <?php else: ?>
                            <label class="checkbox-inline"><input type="checkbox" name="ORNT_PROFISSIO_TRAB" value="1"/>Profissionalização/Trabalho</label><br>
                            <?php endif; ?>
                            <label>Especifique</label>
                            <input type="text" class="form-control"  name="ORNT_PROFISSIO_TRAB_OBS" value="<?php echo e($orientacao_tipo_1->ORNT_HABITACAO_OBS); ?>"><br>                            

                        </div>
                    </div>
                </div>
            </article>
        </section><br>

        <section id="hide_section" >
            <article style="padding-left: 15px;">
                <div class="btn func">13.2 Orientação Familiar - Tipo 2 </div>

                <div class="row">
                    <div class="col-md-11">
                        <div class="form-group">  
                            <label>OBS - Identificar os motivos para ser atendido por cada serviço. Em caso da impossibilidade do atendimento, registrar o impedimento: falta de serviços, falta de vagas, atendimento inadequado, falta de adesão da família, distância dos serviços, dentre outros. <br> <br> 
                                Quais as instituições e os serviços que devem prestar atendimento a criança e/ou adolescente e a família para promover a reintegração familiar? <br></label><br><br>

                                <?php if($orientacao_tipo_2->ORNT_CONS_TUT == 1): ?>
                                <label class="checkbox-inline"><input type="checkbox" name="ORNT_CONS_TUT" value="1" checked/>Conselho Tutelar</label><br>
                                <?php else: ?>
                                <label class="checkbox-inline"><input type="checkbox" name="ORNT_CONS_TUT" value="1"/>Conselho Tutelar</label><br>
                                <?php endif; ?>
                                <label>Observação</label>
                                <input type="text" class="form-control"  name="ORNT_CONS_TUT_OBS" value="<?php echo e($orientacao_tipo_2->ORNT_CONS_TUT_OBS); ?>"><br>                                
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>Proteção Social Básica</label><br/>
                                <textarea class="col-md-10" name="ORNT_PROTECAO_SOCIAL_BASICA"><?php echo e($orientacao_tipo_2->ORNT_PROTECAO_SOCIAL_BASICA); ?></textarea>
                            </div>
                        </div>  
                    </div>

                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>Proteção Social Especial</label><br/>
                                <textarea class="col-md-10" name="ORNT_PROTECAO_SOCIAL_ESPECIAL"><?php echo e($orientacao_tipo_2->ORNT_PROTECAO_SOCIAL_ESPECIAL); ?></textarea>
                            </div>
                        </div>  
                    </div><br>

                    <div class="row">
                        <div class="col-md-11">
                            <div class="form-group"> 

                                <?php if($orientacao_tipo_2->ORNT_OUTROS_SERVICOS == 1): ?>
                                <label class="checkbox-inline"><input type="checkbox" name=" ORNT_OUTROS_SERVICOS" value="1" checked/>Outros Serviços de apoio sócio-familiar</label><br>
                                <?php else: ?>
                                <label class="checkbox-inline"><input type="checkbox" name=" ORNT_OUTROS_SERVICOS" value="1"/>Outros Serviços de apoio sócio-familiar</label><br>
                                <?php endif; ?>
                                <label>Especifique</label>
                                <input type="text" class="form-control"  name="1" value="<?php echo e($orientacao_tipo_2->ORNT_OUTROS_SERVICOS_OBS); ?>"><br>
                                

                                <?php if($orientacao_tipo_2->ORNT_SAUDE == 1): ?>
                                <label class="checkbox-inline"><input type="checkbox" name="ORNT_SAUDE" value="1" checked/>Saúde</label><br>
                                <?php else: ?>
                                <label class="checkbox-inline"><input type="checkbox" name="ORNT_SAUDE" value="1"/>Saúde</label><br>
                                <?php endif; ?>
                                <label>Especifique</label>
                                <input type="text" class="form-control"  name="ORNT_SAUDE_OBS" value="<?php echo e($orientacao_tipo_2->ORNT_SAUDE_OBS); ?>"><br>
                                

                                <?php if($orientacao_tipo_2->ORNT_EDUCACAO == 1): ?>
                                <label class="checkbox-inline"><input type="checkbox" name="ORNT_EDUCACAO" value="1" checked/>Educação</label><br>
                                <?php else: ?>
                                <label class="checkbox-inline"><input type="checkbox" name="ORNT_EDUCACAO" value="1"/>Educação</label><br>
                                <?php endif; ?>
                                <label>Especifique</label>
                                <input type="text" class="form-control"  name="ORNT_EDUCACAO_OBS" value="<?php echo e($orientacao_tipo_2->ORNT_EDUCACAO_OBS); ?>"><br>
                                

                                <?php if($orientacao_tipo_2->ORNT_HABITACAO == 1): ?>
                                <label class="checkbox-inline"><input type="checkbox" name="ORNT_HABITACAO" value="1" checked/>Habitação</label><br>
                                <?php else: ?>
                                <label class="checkbox-inline"><input type="checkbox" name="ORNT_HABITACAO" value="1"/>Habitação</label><br>
                                <?php endif; ?>
                                <label>Especifique</label>
                                <input type="text" class="form-control"  name="ORNT_HABITACAO_OBS" value="<?php echo e($orientacao_tipo_2->ORNT_HABITACAO_OBS); ?>"><br>                                

                                <?php if($orientacao_tipo_2->ORNT_PROFISSIO_TRAB == 1): ?>
                                <label class="checkbox-inline"><input type="checkbox" name="ORNT_PROFISSIO_TRAB" value="1" checked/>Profissionalização/Trabalho</label><br>
                                <?php else: ?>
                                <label class="checkbox-inline"><input type="checkbox" name="ORNT_PROFISSIO_TRAB" value="1"/>Profissionalização/Trabalho</label><br>
                                <?php endif; ?>
                                <label>Especifique</label>
                                <input type="text" class="form-control"  name="ORNT_PROFISSIO_TRAB_OBS" value="<?php echo e($orientacao_tipo_2->ORNT_PROFISSIO_TRAB_OBS); ?>"><br>                                
                            </div>
                        </div>
                    </div>
                </article>
            </section><br>

            <section id="hide_section" >
                <article style="padding-left: 15px;">
                    <div class="btn func">14. Renda Familiar e Moradia</div>

                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Renda Familiar</label><br>
                                <select name="FK_QEPI_ID[]"  class="form-control col-md-2">
                                 <option value="<?php echo e($renda_familiar->QEPI_ID); ?>"><?php echo e($renda_familiar->QEPI_DESCRICAO); ?></option>
                                 <?php $__currentLoopData = $qpis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qpi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php if($qpi->FK_QESP_ID == 13 && $qpi->QEPI_SIT == 1): ?>
                                 <option value="<?php echo e($qpi->QEPI_ID); ?>"><?php echo e($qpi->QEPI_DESCRICAO); ?></option>
                                 <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </select>
                         </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                            <label>Tipo de Moradia</label><br>
                            <select name="FK_QEPI_ID[]"  class="form-control col-md-2">
                             <option value="<?php echo e($tipo_moradia->QEPI_ID); ?>"><?php echo e($tipo_moradia->QEPI_DESCRICAO); ?></option>
                             <?php $__currentLoopData = $qpis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qpi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <?php if($qpi->FK_QESP_ID == 14 && $qpi->QEPI_SIT == 1): ?>
                             <option value="<?php echo e($qpi->QEPI_ID); ?>"><?php echo e($qpi->QEPI_DESCRICAO); ?></option>
                             <?php endif; ?>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </select>
                     </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form-group">
                        <label>Situação do Imóvel</label><br>
                        <select name="FK_QEPI_ID[]"  class="form-control col-md-2">
                         <option value="<?php echo e($situacao_imovel->QEPI_ID); ?>"><?php echo e($situacao_imovel->QEPI_DESCRICAO); ?></option>
                         <?php $__currentLoopData = $qpis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qpi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php if($qpi->FK_QESP_ID == 15 && $qpi->QEPI_SIT == 1): ?>
                         <option value="<?php echo e($qpi->QEPI_ID); ?>"><?php echo e($qpi->QEPI_DESCRICAO); ?></option>
                         <?php endif; ?>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </select>
                 </div>
             </div> 

         </div>

         <div class="row">

            <div class="col-md-10">
                <div class="form-group">
                    <label>Condição da moradia</label><br/>
                    <textarea class="col-md-10" name="ACMT_MORA_CONDICAO"  placeholder="ex: casa de alvenaria ou de madeira, nº de cômodos, higiene, organização, etc."><?php echo e($acmt->ACMT_MORA_CONDICAO); ?></textarea>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-10">
                <div class="form-group">
                    <label>Informar endereço, telefone da família extensa, das pessoas significativas da rede social da criança e/ou adolescente e da família</label><br/>
                    <textarea class="col-md-10" name="ACMT_INFOR_FAM_EXTENSA"><?php echo e($acmt->ACMT_INFOR_FAM_EXTENSA); ?></textarea>
                </div>
            </div>  
        </div>
    </article>
</section><br>  

<section id="hide_section" >
    <article style="padding-left: 15px;">
        <div class="btn func">15. Estudo de caso</div>

        <div class="row">
            <div class="col-md-11">
                <div class="form-group">  
                    <label>Esse estudo de caso indica que as ações a serem desenvolvidas no PIA</label>
                    <div class="row">
                       <div class="col-md-5">  
                        <ul>
                            <?php
                            $flag = 0;
                            $question = 16;
                            $pos = $question - 1;
                            $dividir = $apis_array[$pos] % 2 == 0 ? $apis_array[$pos]/2 : ($apis_array[$pos]/2) + 0.5;
                            ?>
                            <?php $__currentLoopData = $qpis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qpi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $cont_repeticao=0; ?>

                            <?php if($qpi->FK_QESP_ID == $question && $qpi->QEPI_SIT == 1): ?>
                            <?php $flag = $flag + 1; ?>

                            <li style="list-style-type:none;">    
                                <?php for($i=0; $i<$qt_tipo_acoes_pia; $i++): ?>                                                                    
                                <?php if($qpi->QEPI_ID == $tipo_acoes_pia[$i]->QEPI_ID ): ?>
                                <li style="list-style-type:none;">          
                                    <label class="checkbox-inline"><input type="checkbox" name="FK_QEPI_ID[]" value="<?php echo e($qpi->QEPI_ID); ?>" checked/><?php echo e($qpi->QEPI_DESCRICAO); ?></label>
                                </li>
                                <?php $cont_repeticao++; ?>  

                                <?php endif; ?>
                                <?php endfor; ?>
                                <?php if($cont_repeticao==0): ?>    
                                <label class="checkbox-inline"><input type="checkbox"  name="FK_QEPI_ID[]" value="<?php echo e($qpi->QEPI_ID); ?>"/><?php echo e($qpi->QEPI_DESCRICAO); ?></label>
                                <?php endif; ?>
                            </li>
                            <?php if($flag == $dividir): ?>
                        </ul>    
                    </div>  

                    <div class="col-md-6">
                        <ul>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>    
                    </div>
                </div>    
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-10">
            <div class="form-group">
                <label>Observações</label><br/>
                <textarea class="col-md-10" name="ACMT_OBS_GERAIS"><?php echo e($acmt->ACMT_OBS_GERAIS); ?></textarea>
            </div>
        </div>  

    </div>
</article>
</section><br>                                                                                                                                                  




<div class="row">

    <br><br>
    <div align="center" >
        <input type="submit" value="Editar Criança" class="btn btn-info btn-fill">
        <input style="margin-left:10%; width: 150px;" type="button" name="" value="Cancelar" class="btn btn-info btn-danger" onClick="JavaScript: window.history.back();">
    </div>
    <br>
</div>
</form>
</div>
</div> 
</div>                
</div>
</div>
</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(document).on('change', ' .state_city', function(){
           //console.log("mudou!");

           var estd_uf = $(this).val();
            //console.log(estd_uf);

            var div = $(this).parents();

            var op=" ";

            $.ajax({
                type: 'get',
                url: '<?php echo URL::to('find_cities'); ?>', 
                data:{'uf':estd_uf},
                success:function(data){
                    //console.log('com sucesso!');
                    console.log(data);
                    //console.log(data.length);

                    op+='<option value="0" selected disabled>Selecione a cidade</option>';
                    for(var i=0; i<data.length; i++){
                        op+='<option value=" '+data[i].CIDADE_DESC+' "> '+data[i].CIDADE_DESC+'</option>';
                    }     

                    div.find('.city_state').html(" ");
                    div.find('.city_state').append(op);

                },
                error:function(){

                }
            });

        } );
    } );

    $(document).ready(function(){
        $(document).on('change', ' .state_city_resp', function(){
           //console.log("mudou!");

           var estd_uf = $(this).val();
            //console.log(estd_uf);

            var div = $(this).parents();

            var op=" ";

            $.ajax({
                type: 'get',
                url: '<?php echo URL::to('find_cities'); ?>', 
                data:{'uf':estd_uf},
                success:function(data){
                    //console.log('com sucesso!');
                    //console.log(data);
                    //console.log(data.length);

                    op+='<option value="0" selected disabled>Selecione a cidade</option>';
                    for(var i=0; i<data.length; i++){
                        op+='<option value=" '+data[i].CIDADE_DESC+' "> '+data[i].CIDADE_DESC+'</option>';
                    }     

                    div.find('.city_state_resp').html(" ");
                    div.find('.city_state_resp').append(op);

                },
                error:function(){

                }
            });

        } );
    } );

    $(document).ready(function(){
        $(document).on('change', ' .advice_counselor', function(){
           //console.log("mudou!");

           var cons_id = $(this).val();
            //console.log(cons_id);

            var div2 = $(this).parents();

            var op2=" ";

            $.ajax({
                type: 'get',
                url: '<?php echo URL::to('find_counselors'); ?>', 
                data:{'id':cons_id},
                success:function(data){
                    //console.log('com sucesso!');
                    //console.log(data);
                    //console.log(data.length);

                    op2+='<option value="0" selected disabled>Selecione o conselheiro</option>';
                    for(var i=0; i<data.length; i++){
                        op2+='<option value=" '+data[i].CONS_ID+' "> '+data[i].CONS_NOME+'</option>';
                    }     

                    div2.find('.counselor_advice').html(" ");
                    div2.find('.counselor_advice').append(op2);

                },
                error:function(){

                }
            });

        } );
    } );
</script>

<div id="divResponsavelBase" style="display:none; margin-left:15px">
 <hr style="height: 10px;  border: 0;  box-shadow: 0 10px 10px -10px #8c8b8b inset;"> <br>
 <div class="row">      
    <div class="col-md-4">
        <div class="form-group">
            <label>Nome do Responsável</label>
            <input type="text" class="form-control" placeholder="Nome do responsável" name="RESP_NOME[]">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label>Grau de Parenteco</label><br>
            <select name="FK_GRPA_ID[]"  class="form-control col-md-2">
                <option value="">Selecione</option>
                <?php $__currentLoopData = $graus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grau): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($grau->GRPA_ID); ?>"><?php echo e($grau->GRPA_NOME); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>

</div>

<div class="row"> 

    <div class="col-md-2">
        <div class="form-group">
            <label>Estado</label><br>
            <select name="FK_RESP_ESTD[]" class="form-control">
                <option value="">Selecione</option>
                <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($state->ESTD_UF); ?>"><?php echo e($state->ESTD_DESC); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label>Cidade</label><br>
            <select name="FK_RESP_CIDADE[]" class="form-control">
                <option value="">Selecione</option>
                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($city->CIDADE_DESC); ?>"><?php echo e($city->CIDADE_DESC); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Endereço</label>
            <input type="text" class="form-control" placeholder="Endereço" name="RESP_END_CSA[]">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Bairro</label>
            <input type="text" class="form-control" placeholder="Bairro" name="RESP_BAIRRO[]">
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-2">
        <div class="form-group">
            <label>Data de Nascimento</label>
            <input type="date" class="form-control"  name="RESP_DT_NASCI[]">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label>RG</label>
            <input type="number" class="form-control" placeholder="RG" name="RESP_RG[]">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label>CPF</label>
            <input type="number" class="form-control" placeholder="CPF" name="RESP_CPF[]">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label>Contato</label>
            <input type="number" class="form-control" placeholder="Contato" name="RESP_TEL[]">
        </div>
    </div>

</div>                                    

<div class="row">

    <div class="col-md-3">
        <div class="form-group">
            <label>Ponto de Referência</label>
            <input type="text" class="form-control" placeholder="Ponto de referência" name="RESP_PONT_REF[]">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>Profissão/trabalho</label>
            <input type="text" class="form-control" placeholder="Profissão/Trabalho" name="RESP_PROF[]">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Endereço do trabalho</label>
            <input type="text" class="form-control" placeholder="Endereço do Trarbalho" name="RESP_END_TRAB[]">
        </div>
    </div>
    
</div>
<input type="button" value="Remover" onclick="responsavelList.remove(this.parentNode)" /><br><br>
</div>

<!-- form dinamico dos responsaveis da criança -->
<script>
    responsavelList = {
        'init': function()
        {
            this.divResponsavelList = document.getElementById('divResponsavelList');
            this.divResponsavelBase = document.getElementById('divResponsavelBase');
        },
        
        'insert': function()
        {
            responsavelList.init();
            var newDiv = this.divResponsavelBase.cloneNode(true);
            newDiv.style.display = '';

            console.log('newDiv => ', newDiv);
            this.divResponsavelList.appendChild(newDiv);
        },
        
        'remove': function(el)
        {
            el.parentNode.removeChild(el);
        }
    };
    responsavelList.init();
</script>

<!-- form dinamico da criança externa -->

<div id="div_cria_extrBase" style="display:none; margin-left: 10px;">
 <hr style="height: 10px;  border: 0;  box-shadow: 0 10px 10px -10px #8c8b8b inset;"> <br>
 <div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <label>Nome da Criança Externa</label>
            <input type="text" class="form-control" placeholder="Nome da criança externa" name="CRIA_EXTR_NOME[]">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Nome do Responsável</label>
            <input type="text" class="form-control" placeholder="Nome da criança externa" name="CRIA_EXTR_FAM_NOME[]">
        </div>
    </div>

</div>
<div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <label>Nome da Instituição de Acolhimento</label>
            <input type="text" class="form-control" placeholder="Nome do Responsável" name="CRIA_EXTR_NOME_INSTI[]">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Endereço da(s) instituição(ões)</label>
            <input type="text" class="form-control" placeholder="Endereço da Instituição" name="CRIA_EXTR_END_INSTI[]">
        </div>
    </div>
</div>

<div class="row">

    <div class="col-md-3">
        <div class="form-group">
            <label>Data de Nascimento</label>
            <input type="date" class="form-control"  name="CRIA_EXTR_DATA_NASC[]">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label>Contato</label>
            <input type="number" class="form-control" placeholder="Contato" name="CRIA_EXTR_FAM_CONT[]">
        </div>
    </div>
</div>
<input type="button" value="Remover" onclick="cria_extrList.remove(this.parentNode)" /><br><br>
</div>


<!-- form dinamico da criança externa -->
<script>
    cria_extrList = {
        'init': function()
        {
            this.div_cria_extrList = document.getElementById('div_cria_extrList');
            this.div_cria_extrBase = document.getElementById('div_cria_extrBase');
        },
        
        'insert': function()
        {
            cria_extrList.init();
            var newDiv = this.div_cria_extrBase.cloneNode(true);
            newDiv.style.display = '';

            console.log('newDiv => ', newDiv);
            this.div_cria_extrList.appendChild(newDiv);
        },
        
        'remove': function(el)
        {
            el.parentNode.removeChild(el);
        }
    };
    cria_extrList.init();
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>