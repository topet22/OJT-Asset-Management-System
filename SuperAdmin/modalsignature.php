<!------------------------------ MODAL ADD SIGNATURE ---------------------------------------------->
<div class="modal fade" id="Signature" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add Signature</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="row g-2">
                  <div class="col-sm-6">
                          <div class="form-floating">
                                <div class="container" id="signature">
                                    <div class="row">
                                    <div class="col-md-12">
                                        
                                        <canvas id="sig-canvas" width="400" height="160" style="border: 2px dotted #CCCCCC;border-radius: 15px;cursor: crosshair;">
                                        Get a better browser, bro.
                                        </canvas>
                                    

                                    </div>
                                    </div>
                                        <div class="row">
                                        <div class="col-md-12">
                                            
                                            <button class="btn btn-secondary" id="sig-clearBtn">Clear Signature</button>
                                            <button class="btn btn-primary" id="sig-submitBtn">Done</button>
                                        </div>
                                        </div>
                                    <br/>
                                    <div class="row">
                                    <div class="col-md-12">
                                        <input id="sigdataUrl" class="form-control" hidden>
                                        <img id="imgshow" src="" alt="">
                                        <span id="msg"></span>
                                    </div>
                                    </div>
                                    <br/>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
              
              <button type="button" class="btn btn-primary" id="savesignature">Save</button>
              </div>
          </div>
          </div>
      </div> 

<script>
    (function() {
                window.requestAnimFrame = (function(callback) {
                  return window.requestAnimationFrame ||
                    window.webkitRequestAnimationFrame ||
                    window.mozRequestAnimationFrame ||
                    window.oRequestAnimationFrame ||
                    window.msRequestAnimaitonFrame ||
                    function(callback) {
                      window.setTimeout(callback, 1000 / 60);
                    };
                })();

                var canvas = document.getElementById("sig-canvas");
                var ctx = canvas.getContext("2d");
                ctx.strokeStyle = "#222222";
                ctx.lineWidth = 4;

                var drawing = false;
                var mousePos = {
                  x: 0,
                  y: 0
                };
                var lastPos = mousePos;

                canvas.addEventListener("mousedown", function(e) {
                  drawing = true;
                  lastPos = getMousePos(canvas, e);
                }, false);

                canvas.addEventListener("mouseup", function(e) {
                  drawing = false;
                }, false);

                canvas.addEventListener("mousemove", function(e) {
                  mousePos = getMousePos(canvas, e);
                }, false);

                // Add touch event support for mobile
                canvas.addEventListener("touchstart", function(e) {

                }, false);

                canvas.addEventListener("touchmove", function(e) {
                  var touch = e.touches[0];
                  var me = new MouseEvent("mousemove", {
                    clientX: touch.clientX,
                    clientY: touch.clientY
                  });
                  canvas.dispatchEvent(me);
                }, false);

                canvas.addEventListener("touchstart", function(e) {
                  mousePos = getTouchPos(canvas, e);
                  var touch = e.touches[0];
                  var me = new MouseEvent("mousedown", {
                    clientX: touch.clientX,
                    clientY: touch.clientY
                  });
                  canvas.dispatchEvent(me);
                }, false);

                canvas.addEventListener("touchend", function(e) {
                  var me = new MouseEvent("mouseup", {});
                  canvas.dispatchEvent(me);
                }, false);

                function getMousePos(canvasDom, mouseEvent) {
                  var rect = canvasDom.getBoundingClientRect();
                  return {
                    x: mouseEvent.clientX - rect.left,
                    y: mouseEvent.clientY - rect.top
                  }
                }

                function getTouchPos(canvasDom, touchEvent) {
                  var rect = canvasDom.getBoundingClientRect();
                  return {
                    x: touchEvent.touches[0].clientX - rect.left,
                    y: touchEvent.touches[0].clientY - rect.top
                  }
                }

                function renderCanvas() {
                  if (drawing) {
                    ctx.moveTo(lastPos.x, lastPos.y);
                    ctx.lineTo(mousePos.x, mousePos.y);
                    ctx.stroke();
                    lastPos = mousePos;
                  }
                }

                // Prevent scrolling when touching the canvas
                document.body.addEventListener("touchstart", function(e) {
                  if (e.target == canvas) {
                    e.preventDefault();
                  }
                }, false);
                document.body.addEventListener("touchend", function(e) {
                  if (e.target == canvas) {
                    e.preventDefault();
                  }
                }, false);
                document.body.addEventListener("touchmove", function(e) {
                  if (e.target == canvas) {
                    e.preventDefault();
                  }
                }, false);

                (function drawLoop() {
                  requestAnimFrame(drawLoop);
                  renderCanvas();
                })();

                function clearCanvas() {
                  canvas.width = canvas.width;
                }

                // Set up the UI
                var sigText = document.getElementById("sigdataUrl");
                //var sigImage = document.getElementById("sig-image");
                var imgshow = document.getElementById("imgshow");
                var clearBtn = document.getElementById("sig-clearBtn");
                var submitBtn = document.getElementById("sig-submitBtn");
                var message = document.getElementById("msg");
                clearBtn.addEventListener("click", function(e) {
                  clearCanvas();
                  sigText.value = "";
                  msg.innerHTML="";
                  imgshow.setAttribute("src", "");
                }, false);
                submitBtn.addEventListener("click", function(e) {
                  var dataUrl = canvas.toDataURL();
                  sigText.value = dataUrl;
                  message.innerHTML="Click 'SAVE' to proceed!";
                 // sigImage.setAttribute("src", dataUrl);
                  imgshow.setAttribute("src", dataUrl);
                }, false);

              })();
 
</script>