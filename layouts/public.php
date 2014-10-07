<?php
$CI 			= & get_instance();
$CI->load->library(array('session', 'datas'));

$today 			= 	$CI->datas->getMinDateExtenso();


//--- Importante para o ajax ---//
$_SESSION['CI_ROOT'] = site_url();
//--- fim ---//

//--- Importante para o upload de fotos ---//
$base_url_upload = str_replace('http://geradoc', '', base_url());
$_SESSION['base_url_upload'] = $base_url_upload;
//--- fim ---//

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="pt-br" />
    <meta http-equiv="refresh" content="<?php echo $CI->config->item('sess_expiration');?>" />
    <meta name="author" content="Tarso de Castro">
	<meta name="reply-to" content="tarsodecastro@gmail.com">
	<meta name="revised" content="Tarso de Castro, 12/09/2013" />
	<meta name="description" content="GeraDoc - Sistema desenvolvido para facilitar a criação de documentos oficiais padronizados nos setores da Academia Estadual de Segurança Pública do Estado do Ceará.">
	<meta name="abstract" content="GeraDoc - AESP-CE">
	<meta name="keywords" content="aluno on-line, fale conosco, aesp, geradoc, documento, oficio, comunicacao interna, memorando, despacho, portaria, php, software livre, corpo de bombeiros">
	<meta name="ROBOT" content="Index,Follow">
	
	<link rel="shortcut icon" href="{TPL_images}<?php echo $CI->config->item('orgao');?>.ico" type="image/x-icon" />
	<link rel="icon" href="{TPL_images}<?php echo $CI->config->item('orgao');?>.ico" />
	
    <title><?php echo $CI->config->item('title');?></title>
    
	{TPL_css}
	<link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
	<link href="<?php echo base_url();?>bootstrap/css/cus-icons.css" rel="stylesheet"> 
	<link href="<?php echo base_url();?>bootstrap/css/datatables.bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url();?>bootstrap/css/bootstrap-theme.css" rel="stylesheet">
	<link href="<?php echo base_url();?>bootstrap/css/bootstrap_custom.css" rel="stylesheet">
	<link href="<?php echo base_url();?>bootstrap/css/sticky-footer-navbar.css" rel="stylesheet">
	
	<script type="text/javascript">
		var CI_ROOT = '<?php echo site_url(); ?>';    	 
    </script>
    {TPL_js}
    {TPL_js_custom}
    </head>
    <body>

            <div class="container">
            
            <!--  Topo -->
            <div class="row" id="topo">
	            <div class="col-sm-1 col-md-1 col-lg-1"></div>
	            <div class="col-sm-9 col-md-8 col-lg-9">
	            	<div class="row" >
		            	<div id="topo_center"> 
		            	
		            		<div class="col-lg-3 visible-lg">
		                    	<strong><?php echo $today; ?></strong> &nbsp; &nbsp;
		                    </div>
		                    
		                    <div class="col-sm-12 col-md-9 col-lg-9">
		                    	
		                    </div>
	               		</div>
               		</div>
                </div>
	            <div class="col-sm-12 col-md-3 col-lg-2 visible-md visible-lg text-right"><div id="topo_right" class="text-right"></div></div>
            </div>
            <!-- Fim do Topo -->
            
            <!--  Logo -->
            <div class="row">
	        
	                
	                <div class="col-md-6 col-lg-6 visible-md visible-lg">
	                	<img src="<?php echo $CI->config->item('base_url');?>images/bg_logo_left_<?php echo $CI->config->item('orgao');?>.png"> 	
	                </div>
	                
	                <div class="col-sm-12 col-md-6 col-lg-6 text-right" id="logo_right" style="padding-right: 25px;">
	                	<div ><?php echo $CI->config->item('title_short');?></div>
	                </div>
	          
            </div>
            <!-- Fim do Logo -->
            
            <!--  Menu -->
             
            <div class="row"> 
	             <nav class="navbar navbar-default" role="navigation">
				  <div class="container-fluid">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				    </div>
				
				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      <ul class="nav navbar-nav">

				        <li><a href="#" id="about" title="Sobre este sistema"><span class="glyphicon glyphicon-thumbs-up"></span> Sobre</a></li>
				        <li><a href="<?php echo site_url('login/logoff'); ?>" title="Sair do sistema" ><span class="glyphicon glyphicon-off"></span> Sair</a></li>
				        
				      </ul>
	
				    </div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>

        	</div>
            <!--  Fim do Menu -->
            
            
            {TPL_content}	
            
            </div>
            <!--  Fim do container-->

  
            <!--  Rodape -->
            <div id="rodape" class="footer">
            	<div class="container">	
              		<?php echo $CI->config->item('rodape_sistema');?>	
             	</div>		
            </div> 
            <!--  Fim do Rodape  -->
           
           <div id="modalDialog" style="display:none; min-height: 300px;">
				<div class="title">
					<?php 
						$pos = strpos($CI->config->item('title_short'), "<");
						$titulo_modal = substr($CI->config->item('title_short'), 0, $pos);
						echo $titulo_modal;
					?>
				</div>
				<div class="close"><a href="#" id="bt_cancelar"> X </a></div>
				<div class="text">
					{TPL_modal}
				</div>
				<div class="foot"></div>
			</div> 
            
         <script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
         <script src="<?php echo base_url();?>bootstrap/js/datatables.bootstrap.js"></script>
         <script src="<?php echo base_url();?>bootstrap/js/bootstrap-select.min.js"></script>
         
    </body>
</html>
