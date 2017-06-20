<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package shopress
 */
get_header(); ?>
<!--==================== ti breadcrumb section ====================-->
<?php get_template_part('index','banner'); ?>
<!--==================== main content section ====================-->
<main id="content">
  <div class="container">
    <div class="row">
      <div class="<?php if( !is_active_sidebar('sidebar-1')) { echo "col-md-12"; } else { echo "col-md-9 col-sm-8"; } ?>">
        <?php while(have_posts()){the_post();
          get_template_part('content',''); ?>
          <?php } ?>
          <div class="col-md-12 text-center">
          <?php
      //Previous / next page navigation
      the_posts_pagination( array(
      'prev_text'          => '<i class="fa fa-angle-left"></i>',
      'next_text'          => '<i class="fa fa-angle-right"></i>',
      'screen_reader_text' => ' ',
      ) );
      ?>
          </div>
      </div>
      <aside class="col-md-3 col-sm-4">
        <?php get_sidebar(); ?>
      </aside>
    </div>
    <div class="row">
      <div class="col-md-7 col-lg-7" id="model">
        <button id="redBtn" class="btn btn-danger btn1">Red</button>
        <button id="greenBtn" class="btn btn-success">Green</button>
        <button id="blueBtn" class="btn btn-primary">Blue</button>
        <button id="goldBtn" class="btn">Gold</button>
        <button id="pinkBtn" class="btn">Pink</button>
        <button id="purpleBtn" class="btn">Purple</button>
        <button id="transparentBtn" class="btn btn">Transparent</button>
            
        <script type="text/javascript">
            var container, stats;
            var camera, scene, renderer;
            var mouseX = 0, mouseY = 0;
    
            var windowHalfX = window.innerWidth / 2;
            var windowHalfY = window.innerHeight / 2;
            var WIDTH = jQuery('#model').width(), HEIGHT = jQuery('#model').height();
    
            var redObj, greenObj, blueObj, purpleObj, goldObj, transObj, pinkObj;
    
            init();
            animate();
    
            function init() {
    
                container = document.createElement('div');
                document.body.appendChild(container);
    
                camera = new THREE.PerspectiveCamera(90, window.innerWidth / window.innerHeight, 1, 2000);
                camera.position.z = 6;
    
                // scene
                scene = new THREE.Scene();
    
                var ambient = new THREE.AmbientLight(0x444444);
                scene.add(ambient);
    
                var directionalLight = new THREE.DirectionalLight(0xffeedd);
                directionalLight.position.set(2, 0, 1).normalize();
                scene.add(directionalLight);
    
                // BEGIN Clara.io JSON loader code
                var objectLoader1 = new THREE.ObjectLoader();
                objectLoader1.load("blue_Shoe.json", function (obj) {
                    blueObj = obj;
                   scene.add(blueObj);
                });
    
                var objectLoader2 = new THREE.ObjectLoader();
                objectLoader2.load("red_Shoe.json", function (obj) {
                    redObj = obj;
                   scene.add(redObj);
                });
    
                var objectLoader3 = new THREE.ObjectLoader();
                objectLoader3.load("green_Shoe.json", function (obj) {
                    greenObj = obj;
                    scene.add(greenObj);
                });
    
                var objectLoader4 = new THREE.ObjectLoader();
                objectLoader4.load("pink_Shoe.json", function (obj) {
                    pinkObj = obj;
                   scene.add(pinkObj);
                });
    
                var objectLoader5 = new THREE.ObjectLoader();
                objectLoader5.load("purple_Shoe.json", function (obj) {
                    purpleObj = obj;
                  scene.add(purpleObj);
                });
    
                var objectLoader6 = new THREE.ObjectLoader();
                objectLoader6.load("gold_Shoe.json", function (obj) {
                    goldObj = obj;
                    scene.add(goldObj);
                });
    
                var objectLoader7 = new THREE.ObjectLoader();
                objectLoader7.load("transparent.json", function (obj) {
                    transObj = obj;
                    scene.add(transObj);
                });
                // END Clara.io JSON loader code
    
                document.getElementById("redBtn").addEventListener("click", loadRed);
                document.getElementById("greenBtn").addEventListener("click", loadGreen);
                document.getElementById("blueBtn").addEventListener("click", loadBlue);
                document.getElementById("goldBtn").addEventListener("click", loadGold);
                document.getElementById("pinkBtn").addEventListener("click", loadPink);
                document.getElementById("purpleBtn").addEventListener("click", purpleLoad);
                document.getElementById("transparentBtn").addEventListener("click", loadTransparent);
    
                function loadRed() {
                    console.log('change red');
                    if (scene.children[2].name !== "RedShoe") {
                        scene.remove(scene.children[2]);
                        scene.add(redObj);
                    }
                }
    
                function loadGreen() {
                    console.log('change green');
                    if (scene.children[2].name !== "GreenShoe") {
                        scene.remove(scene.children[2]);
                        scene.add(greenObj);
                    }
                }
    
                function loadBlue() {
                    console.log('change blue');
                    if (scene.children[2].name !== "BlueShoe") {
                        scene.remove(scene.children[2]);
                        scene.add(blueObj);
                    }
                }
    
                function loadGold() {
                    console.log('change gold');
                    if (scene.children[2].name !== "GoldShoe") {
                        scene.remove(scene.children[2]);
                        scene.add(goldObj);
                    }
                }
    
                function loadPink() {
                    console.log('change pink');
                    if (scene.children[2].name !== "PinkShoe") {
                        scene.remove(scene.children[2]);
                        scene.add(pinkObj);
                    }
                }
    
                function purpleLoad() {
                    console.log('change purple');
                    if (scene.children[2].name !== "PurpleShoe") {
                        scene.remove(scene.children[2]);
                        scene.add(purpleObj);
                    }
                }
    
                function loadTransparent() {
                    console.log('SCENE: ', scene.children[2]);
                    if (scene.children[2].name !== "TransparentShoe") {
                        scene.remove(scene.children[2]);
                        scene.add(transObj);
                    }
                }
    
                renderer = new THREE.WebGLRenderer();
                renderer.setPixelRatio(window.devicePixelRatio);
                renderer.setSize(window.innerWidth, window.innerHeight);
                container.appendChild(renderer.domElement);
    
                document.addEventListener('mousemove', onDocumentMouseMove, false);
                //
                window.addEventListener('resize', onWindowResize, false);
            }
    
            function onWindowResize() {
    
                windowHalfX = window.innerWidth / 20;
                windowHalfY = window.innerHeight / 20;
    
                camera.aspect = window.innerWidth / window.innerHeight;
                camera.updateProjectionMatrix();
    
                // start the renderer
                renderer.setSize(WIDTH, HEIGHT);
    
            }
    
            function onDocumentMouseMove(event) {
                mouseX = ( event.clientX - windowHalfX ) / 20;
                mouseY = ( event.clientY - windowHalfY ) / 20;
    //				console.log(mouseY);
    
                //not needed?
                if (mouseX < -10) {
                    //alert("reset me");
                }
            }
    
            //
    
            function animate() {
                requestAnimationFrame(animate);
                render();
            }
    
            function render() {
                camera.position.x += ( mouseX - camera.position.x ) * .07;
                camera.position.y += ( -mouseY - camera.position.y ) * .09;
    
                camera.lookAt(scene.position);
                renderer.render(scene, camera);
            }
          
        </script>
      </div>
      <div class="col-md-5 col-lg-5">
        <h1>Shoe model</h1>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>