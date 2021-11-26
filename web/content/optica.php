<div class="fila no-gutters justify-content-center mb-5 pb-5">
    <div class="col-md-7 text-center heading-section ftco-animate">
        <hr class="linea">
        <span class="subheading">Misión & Visión</span>
    </div>
</div>
<div class="row">
    <div class="col-md-6 text-justify">
        <h1  style="font-weight: bold;">MISIÓN</h1>
        Nuestra misión es entregar la mejor solución visual con la máxima protección posible, apoyándonos en cumplir las certificaciones más exigentes del mercado nacional e internacional. Brindamos el mejor resultado en calidad de visión, comodidad y protección. Con una atención personalizada, proceso de fabricación con las últimas tecnologías y calidad certificadas bajo los mas prestigiosos laboratorios a nivel mundial. Nuestra linea óptica esta certificada en los mas prestigiosos entes certificadores en el area de protección visual en Europa y USA.  Todo esto llevado a cabo integrando aspectos económicos, sociales y ambientales a los objetivos estratégicos de la empresa.
    </div>
    <div class="col-md-6 text-justify">
        <h1 style="font-weight: bold;">VISIÓN</h1>
        Ser reconocidos como una empresa de excelencia, en los servicios y productos que brindamos.

        Mantener un modelo de negocios y una imagen reconocida como resultado de la satisfacción de nuestros clientes, del crecimiento personal de nuestros colaboradores y del respeto al medio ambiente.

        Alcanzar un crecimiento sostenido en las sucursales y en nuevos mercados, gracias a la preferencia y satisfacción de nuestros clientes.
    </div>
</div>
<br><br>
<div class="fila no-gutters justify-content-center mb-5 pb-5">
    <div class="col-md-7 text-center heading-section ftco-animate">
        <hr class="linea">
        <span class="subheading">Ubicación</span>
    </div>
</div>
<div class="container-fluid">
    <div class="row ftco-animate">
        <div class="col-md-12">
            <div class="responsiveContent">  
                <iframe  src="<?=$dt["ub.map"]?>" frameborder="0" style="border:0; min-height: 300px;display:block" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <div class="fila no-gutters justify-content-center mb-5 pb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
            <hr class="linea">
            <span class="subheading">Contáctenos</span>
        </div>
    </div>
    <div class="row d-md-flex ftco-animate">
        <div class="col-lg-3">
            <div class="contact_info">
                <div class="info_item">
                        <i class="glyphicon glyphicon-home"></i>
                        <h6><?=$dt["ub.ciudad"]?></h6>
                        <p><?=$dt["ub.direccion"]?></p>
                </div>
                <div class="info_item">
                        <i class="glyphicon glyphicon-earphone"></i>
                        <h6><a href="#"><?=$dt["ub.telefono"]?></a></h6>
                        <p><?=$dt["gen.horario"]?><br>
                        <?=$dt["gen.horarioFDS"]?></p>
                </div>
                <div class="info_item">
                        <i class="glyphicon glyphicon-envelope"></i>
                        <h6><a href="#"><?=$dt["em.mailAdmin1"]?></a></h6>
                        <p>Envíenos sus consultas en cualquier momento!</p>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <form class="row contact_form" novalidate="novalidate">
                <div class="col-md-6">
                    <div class="form-group">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Su Nombre">
                    </div>
                    <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese Su Correo Electrónico">
                    </div>
                    <div class="form-group">
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese Su Teléfono">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea name="comments" id="comments"  class="form-control" placeholder="En que puedo ayudarle?"></textarea>
                    </div>
                </div>
                <div class="col-md-12 text-right">
                <button type="button" class="btn btn-sistema btn-block" name="enviar" id="enviar" value="Enviar">Enviar</button> 
                </div>
            </form>
        </div>
    </div>
</div>
<br>
<br>