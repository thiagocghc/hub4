<?php

include __DIR__.'/vendor/autoload.php';

use App\Entity\Usuario;
use App\Entity\Palestra;

if(isset($_GET['id_palestra']))
{   
    $id_palestra = filter_input(INPUT_GET,'id_palestra',FILTER_SANITIZE_NUMBER_INT);
    $new_obj = new Palestra();
    $palestra = $new_obj->get_idPalestra($id_palestra);
    $titulo = $palestra->palestra;
    $descricao = $palestra->descricao; 
    $foto =  $palestra->foto;
    $nome_palestrante = $palestra->nome_palestrante; 
    $vagas = $palestra->vagas;
    $sala = $palestra->sala; 
    $bio = $palestra->bio;
    $insta = $palestra->instagram;
    $linked = $palestra->linkedin;
    //echo "<pre>"; print_r($new_obj); echo "</pre>";
}else{
    header('location:./index.php');
}

?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="src/styles/styles.css">
    <link rel="stylesheet" href="src/styles/hub.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="src/styles/inscricao.css">
    
    <script src="node_modules/animejs/lib/anime.min.js"></script>
    <script defer src="src/javascript/inscricao.js"></script>
    <script defer src="src/javascript/cursor.js"></script>

     
    <script>

        var captchaElement
        var onloadCaptcha = () => { 
            captchaElement = grecaptcha.render('localCaptcha', {
                'sitekey' : '6LfjTtgpAAAAAGj0_nSkB7RCNsvZ8HvbZMxe3GW7',
                'theme':"dark"
            });
        }

        function closeModal(){ 
            modal = document.querySelector(".modal_inscricao")
            modal.classList.remove("active")
             
        }

        function activeModal(text,bool){

            var icon_modal = document.getElementById("icon_modal_principal")
            var btn_close_modal = document.querySelector(".btn_close_modal")
            var bubbles = document.querySelectorAll(".bubble")
             

            if(bool){ 
                icon_modal.className = "fa-regular fa-circle-check"
                icon_modal.style.color = "green"
                btn_close_modal.style.backgroundColor = "green"
                bubbles.forEach(e => {
                    e.style.backgroundColor = "green"
                })
                
            }else{ 
                icon_modal.className = "fa-regular fa-circle-xmark"
                icon_modal.style.color = "red"
                btn_close_modal.style.backgroundColor = "red"
                bubbles.forEach(e => {
                    e.style.backgroundColor = "red"
                })
            }
            let modal = document.querySelector(".modal_inscricao")
            document.querySelector("#text_modal").innerHTML = text
            modal.classList.add("active")
        }
    </script>
    
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCaptcha&render=explicit" async defer></script>
 

</head>
<body class="body_inscricao"> 
    <div class="modal_inscricao">

        <div class="back_side">
            <div class="bubble"></div>
            <div class="bubble"></div>
        </div>
        <div class="front_side">
            
            <div class="areaX"> 
                <i class="fa-solid fa-xmark btn_x_modal" onclick="closeModal()"></i> 
            </div>
            <div class="area-text-modal">
                <i id="icon_modal_principal" class="fa-regular fa-circle-check"></i>
                <p id="text_modal">Cadastrado com Sucesso!</p>
                <button class="btn_close_modal"  onclick="closeModal()">OK</button>
            </div>
        </div>

    </div>


    <div class="balls">
        
        <div class="ball ball5" ></div>
        <div class="ball ball1"></div>
        <div class="ball ball2"></div>
        <div class="ball ball3"></div>
        <div class="ball ball4"></div>
    </div>

    <div class="area_inscricao">
        <div class="container_inscricao">
            <div class="left_side">
                
                <div class="vagas_title">
                    <h1><?=$vagas?> Vagas</h1>
                </div>

                <div class="view_ins_pale">
                    <div class="area_icons_ins">
                        <a href="<?=$insta?>" target="_blank" rel="noopener noreferrer"> <i class="fa-brands fa-instagram"></i></a> 
                        <a href="<?=$linked?>" target="_blank" rel="noopener noreferrer"> <i class="fa-brands fa-linkedin"></i></a> 
                    </div>
                    <div class="area_img move"   animation="left"> 
                        <img src="<?=$foto?>" >
                    </div>

                </div>
                
                <h1 class="nome_palestra move" animation="right"> <?=$nome_palestrante?> </h1>
                
                <div class="about_area">
                    <div class="title_about">
                        <div class="tracer"></div>
                        <h2 class="move" animation="top">BIO</h2>
                        <div class="tracer"></div>
                    </div>
                    <p  animation="left" class="desc_about move"> <?=$bio?></p>
                    <div class="title_about">
                        <div class="tracer"></div>
                        <h2 class="move" animation="top">SOBRE</h2>
                        <div class="tracer"></div>
                    </div>
                    <h1 class="move" animation="left"> <?=$titulo?> </h1>
                    <p  animation="left" class="desc_about move"> <?=$descricao?></p>
                </div>
            </div>

            <div class="right_side">
                <form class="content_right_side" id="form_inscricao">
                    <h1 class="title_inscreva "  >INSCREVA-SE</h1>
                    <!-- DATA NASCIMENTO | SEXO | DUAS CHECKBOX -->
                    <div class="inputs"  >

                        <input type="hidden" name="id_palestra" id="id_palestra" value="<?=$id_palestra?>">

                        <div class="input_area">
                            <input required maxlength="100"  class="input" name="nome" id="nome_input" type="text"> 
                            <label for=""  class="input_label"  maxlength="11">NOME</label>
                        </div>
                        <div class="input_area align_input_top">
                            <input required maxlength="100"  class="input" name="email" id="email_input" type="text"> 
                            <label for=""  class="input_label"  maxlength="11">E-MAIL</label>
                        </div>

                        <div class="twoCollumn">
                            
                            <div class="input_area">
                                <input required oninput="mascaraPhone(this)" name="telefone" id="phone_input" maxlength="100"  class="input" type="text"> 
                                <label for=""  class="input_label"  maxlength="11">TELEFONE</label>
                            </div>
    
                            <div class="input_area">
                                <input required  oninput="mascaraCPF(this)" name="cpf" id="cpf_input" class="input" type="text"> 
                                <label for=""  class="input_label"  maxlength="11">CPF</label>
                            </div> 

                        </div>

                        <div class="twoCollumn aling_two_40">
                            <div class="input_area_genero">
                                <label class="label_gen" for="">GÊNERO</label>
                                <select class="input_select_gen" id="gen_input" name="sexo">
                                    <option selected>Selecione</option>
                                    <option value="m">Masculino</option>
                                    <option value="f">Feminino</option>
                                    <option value="o">Outros</option>
                                    <option value="n">Não informar</option>
                                </select>
                            </div> 

                            <div class="input_area_genero">
                                <label class="label_gen" for="">NASCIMENTO</label> 
                                <input class="input_select_gen" name="data_nasc" id="date_input" type="date" name="" id="">
                            </div>

                        </div>

                        <div class="area_checkboxes">
                            <input type="checkbox" name="lgpd" id="lgpd1">
                            <Label>Ao clicar este formulário, você permite que seus dados pessoais sejam processados em nossas plataformas educacionais.</Label>
                        </div>

                        <div class="area_checkboxes">
                            <input type="checkbox" name="info" id="lgpd2">
                            <Label>Você concorda em receber informações a respeito de cursos relacionados ao Senac.</Label>
                        </div>
                        <div id="localCaptcha"></div>
                       

                    </div>


                    <div class="buttons_content">
                        <button class="clicavel" id="cancel_button">Voltar</button>
                         
                        <button name="cadastrar" id="btn_cad" class="clicavel"> 
                            Cadastrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
<script src="src/javascript/script.js"></script>
</html>