<section class="styles_restaurantShelf__pWKxZ container">
                             
                             <div>
                                 <div class="css-x44yx7 ei4pj1i0" style="display: flex; justify-content: space-between; align-items: center;">
                                     <h2 class="styles_title__0O4of" style="margin: 0;">Popular restaurants in Barcelona</h2>
                                     <div style="display: flex; align-items: center;">
                                       <button class="e1w6yrkw2 css-4hc8lh ektx8jp0" style="margin-right: 16px;">
                                         <!-- <span class="css-13at9q0 eulusyj0">
                                           <span role="link" class="css-1unvnzj e1xxesyf0" style="cursor: pointer;">See more</span>
                                         </span> -->
                                       </button>
                                       <div class="customNavigation">
                                         <button class="styles_carrouselPrevArrow__C3mmT styles_arrow__2WdUo e1ovfzkv0 css-1rfw4ap ektx8jp0 prev" style="margin-right: 8px;">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-hidden="true" focusable="false" class="css-p3qwn0 ejhntxf0">
                                             <path fill-rule="evenodd" d="M15.749 20.5c-.24 0-.48-.086-.673-.26l-8.249-7.496a1 1 0 0 1 0-1.479l8.249-7.504a1 1 0 0 1 1.346 1.478l-7.436 6.765 7.436 6.756a1.002 1.002 0 0 1-.673 1.74"></path>
                                           </svg>
                                           <span class="css-l7ijkl ezjtbe50"><span>Previous</span></span>
                                         </button>
                                         <button class="styles_carrouselNextArrow__rSpzl styles_arrow__2WdUo e1ovfzkv0 css-1rfw4ap ektx8jp0 next">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-hidden="true" focusable="false" class="css-p3qwn0 e10xbrur0">
                                             <path fill-rule="evenodd" d="M8.25 20.5a1.002 1.002 0 0 1-.673-1.74l7.436-6.756-7.436-6.765a1 1 0 1 1 1.346-1.478l8.249 7.504a1 1 0 0 1 0 1.479L8.923 20.24c-.193.174-.433.26-.673.26"></path>
                                           </svg>
                                           <span class="css-l7ijkl ezjtbe50"><span>Next</span></span>
                                         </button>
                                       </div>
                                     </div>
                                   </div>
         
                                   <div class="row">
         
                                 <div id="slider-carousel3" class="owl-carousel">
         
         
         
         
                                 @forelse ($shop as $shops)
                                 <div class=" " style="outline:none;">
                                            
                                             <div class="" 
                                                >
         
                                                 <div  class="css-125s5yu eytdi1r3">
                                                     <div class="css-1fh8qjj e1xxesyf0">
                                                         <div data-test="restaurant-card-image" class="css-1e38alf eytdi1r2 ">
                                                             <img  alt=""
                                                                 src="{{asset('vendor/shop/'.$shops->logo)}}"
                                                                  class="eb34jsh0 css-1qrxtxt eb34jsh1 img-fluid" />
         
                                                         <p data-testid="tags-layout" class="css-zmb4ti eulusyj0">
                                                             <span class="css-hazaz3 e6i9wrr2">Italian</span>
                                                         </p>                                                </div>
                                                         <div class="css-4sye6w elkhwc30">
                                                             <h3 color="special.black" class="css-bue2rm eytdi1r1">
                                                                 <a href="{{route('shop.single',array('id'=>$shops->id,'slug'=>$shops->shop_slug))}} ">{{$shops->shop_name}}</a>
                                                             </h3>
                                                             <div data-test="restaurant-card-rating"
                                                                 class="css-1hw2w72 eytdi1r0">
                                                                 <span class="css-l7ijkl ezjtbe50">
                                                                     <span>Score:</span>
                                                                 </span>
                                                                 <span>8.2</span>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="css-lbwht3 eulusyj0">
                                                         <div class="css-1ycoc1n e1xxesyf0">
                                                             <p data-testid="tags-layout" class="css-zmb4ti eulusyj0">
                                                                 <span font-weight="m" data-test="thefork-pay-tag" alt="PAY"
                                                                     display="inline-block" color="information"
                                                                     class="css-11lskvk e6i9wrr1">
                                                                     <svg width="12" height="12" viewBox="0 0 253 288"
                                                                         aria-hidden="true" focusable="false"
                                                                         data-testid="tfpay-icon"
                                                                         style="position:relative;bottom:0.0625rem;margin-right:0.25em"
                                                                         class="css-1rxdk56 e1qkig0k0">
                                                                         <path fill="#589442" fill-rule="nonzero"
                                                                             d="M116.972046,109.264985 L116.972046,0 L127.22767,0 L127.22767,109.264985 L116.972046,109.264985 Z M152.585926,2.79891692 L152.585926,105.621563 L142.319228,107.675225 L142.319228,1.37885538 L152.585926,2.79891692 Z M101.867422,1.37974154 L101.867422,107.673895 L91.5940812,105.620234 L91.5940812,2.79980308 L101.867422,1.37974154 Z M110.14168,263.80224 C109.716485,270.463902 109.355512,275.738732 109.355512,275.738732 C48.4573433,269.704025 0.999335632,221.23584 0.999335632,162.31104 C0.999335632,114.895163 30.9977571,74.7413169 74.7109448,57.5322092 C73.8627686,67.1514092 72.6137571,85.7207631 72.2727149,92.9274092 C71.9316728,100.122978 71.6925004,113.162732 73.6368835,124.425748 C75.3243778,134.222178 79.640554,144.328763 84.244623,152.722855 C88.9594199,161.353994 93.9776115,170.162363 96.794531,176.405317 C99.5915195,182.661563 101.201504,186.104271 103.261044,192.672886 C105.287366,199.252578 106.660393,204.203963 107.335834,208.601502 C108.013489,213.023409 109.375443,217.022178 110.225834,227.901932 C111.082868,238.810486 110.918991,239.043102 110.918991,242.578855 C110.918991,246.107963 110.560232,257.169378 110.14168,263.80224 Z M134.047628,263.80224 C133.618003,257.169378 133.263674,246.107963 133.263674,242.578855 C133.263674,239.043102 133.113084,238.810486 133.967903,227.901932 C134.81608,217.022178 136.166961,213.023409 136.853474,208.601502 C137.542202,204.203963 138.895298,199.252578 140.928264,192.672886 C142.974516,186.104271 144.58893,182.661563 147.410279,176.405317 C150.213911,170.162363 155.240961,161.353994 159.944685,152.722855 C164.548754,144.328763 168.86493,134.222178 170.552425,124.425748 C172.503451,113.162732 172.264279,100.122978 171.90552,92.9274092 C171.57998,85.7207631 170.319896,67.1514092 169.47172,57.5322092 C213.184907,74.7413169 243.189972,114.895163 243.189972,162.31104 C243.189972,221.23584 195.738608,269.704025 134.827152,275.738732 C134.827152,275.738732 134.470608,270.463902 134.047628,263.80224 Z">
                                                                         </path>
                                                                     </svg>
                                                                     PAY
                                                                 </span>
                                                                 <span aria-hidden="true" class="css-1unvnzj e1xxesyf0"></span>
                                                                 <span aria-hidden="true" class="css-1unvnzj e1xxesyf0"></span>
                                                             </p>
                                                         </div>
                                                         <p data-test="restaurant-card-average-price"
                                                             class="css-lbwht3 eulusyj0">
                                                             <span>€30 average price</span>
                                                         </p>
                                                     </div>
                                                     <p class="css-537ftl eulusyj0">
                                                         <span display="inline-block" data-test="restaurant-card-discount"
                                                             class="css-1rhev5r e1ffw3qu0">-30%</span>
                                                     </p>
                                                 </div>
                                             </div>
         
         
                                     </div>
                                         @empty
                                             <p>No Shop Found</p>
                                         @endforelse
         
         
         
                                         </div>
         
         
                                 </div>
                             </div>
                         </section>
         