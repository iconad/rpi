
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/stimulus/dist/stimulus.umd.js"></script>
    <script>
      (() => {
        const application = Stimulus.Application.start()

        application.register("slider", class extends Stimulus.Controller {
          static get targets() {
            return [ "scrollContainer", "image", "indicator" ]
          }
          initialize() {
            this.observer = new IntersectionObserver(this.onIntersectionObserved.bind(this), {
              root: this.scrollContainerTarget,
              threshold: 0.5
            })
            this.imageTargets.forEach(image => {
              this.observer.observe(image)
            })
          }
          onIntersectionObserved(entries) {
            entries.forEach(entry => {
              if (entry.intersectionRatio > 0.5) {
                const intersectingIndex = this.imageTargets.indexOf(entry.target)
                this.indicatorTargets[intersectingIndex].classList.add("bg-blue-700")
              }
              else {
                const intersectingIndex = this.imageTargets.indexOf(entry.target)
                this.indicatorTargets[intersectingIndex].classList.remove("bg-blue-700")
              }
            })
          }
          scrollTo() {
            const imageId = event.target.dataset.imageId
            const imageElement = document.getElementById(imageId)
            const imageCoordinates = imageElement.getBoundingClientRect()
            this.scrollContainerTarget.scrollTo({ left: (this.scrollContainerTarget.scrollLeft + imageCoordinates.left), top: false, behavior: "smooth" })
          }
        })
      })()
    </script>


<!-- Slider Logo  -->

      <div class="flex flex-col my-16 mt-32" data-controller="slider">
        <h1 class="text-3xl text-gray-900 text-center mb-4">Our Clients</h1>
        <div class="flex overflow-x-auto hide-scroll-bar overscroll-x-contain gallery" data-slider-target="scrollContainer">

          <div class="w-48 h-26 px-4 flex-shrink-0 gallery-item" data-slider-target="National Paints" id="2">
            <img src="https://rpiuae.com/assets/images/clients/client48.jpg" />
          </div>
          <div class="w-48 h-26 px-4 flex-shrink-0 gallery-item" data-slider-target="Standard Carpet" id="1">
            <img src="https://rpiuae.com/assets/images/clients/client13.jpg" />
          </div>
          <div class="w-48 h-26 px-4 flex-shrink-0 gallery-item" data-slider-target="image" id="3">
            <img src="https://rpiuae.com/assets/images/clients/client46.jpg" />
          </div>
          <div class="w-48 h-26 px-4 flex-shrink-0 gallery-item" data-slider-target="image" id="4">
            <img src="https://www.adnc.ae/images/adnc-logo1.jpg" />
          </div>
          <div class="w-48 h-26 px-4 flex-shrink-0 gallery-item" data-slider-target="image" id="5">
            <img src="https://rpiuae.com/assets/images/clients/client51.jpg" />
          </div>
          <div class="w-48 h-20 mt-8 px-4 flex-shrink-0 gallery-item" data-slider-target="image" id="6">
            <img src="https://taqeef.com/wp-content/themes/taqeef_theme_shop/ui/media/element/logo.svg" />
          </div>








          <div class="w-48 h-26 mt-8 px-4 flex-shrink-0 gallery-item" data-slider-target="Armani" id="19">
          <img src="https://www.brandshowroom.info/assets/images/art/armani.png" />
          </div>



          <div class="w-32 h-18 px-4 mt-8 flex-shrink-0 gallery-item" data-slider-target="GAP" id="19">
          <img src="https://images.ctfassets.net/keh7myspeaj0/2rHSxDjOROmUXaLVfTgU1y/a95092e5c890c779b97f646a5d5cbed4/logo_en.svg" />
          </div>


          <div class="w-48 h-26 px-4 mt-10 flex-shrink-0 gallery-item" data-slider-target="mamas" id="19">
          <img src="https://mamasandpapas.ae/on/demandware.static/-/Library-Sites-MnPSharedLibrary/default/dw7a62bf0d/images/global/OpenGraph/logo-social.png" />
          </div>
         


          <div class="w-48 h-26 mt-8 px-4 flex-shrink-0 gallery-item" data-slider-target="image" id="12">
            <img src="https://prospectdirect.com/wpstagemct/wp-content/uploads/2017/01/awj-logo.jpg" />
          </div>

          <div class="w-48 h-26 px-4 mt-6 flex-shrink-0 gallery-item" data-slider-target="image" id="7">
            <img src="http://www.alexandriaintl.com/flooring/themes/alexandria/dist/images/Alexandria-logo.png" />
          </div>

          <div class="w-48 h-26 px-4 mt-8 flex-shrink-0 gallery-item" data-slider-target="image" id="9">
            <img src="https://www.sharjah.gov.ae/Content/images/logo.png" />
          </div>


          <div class="w-48 h-26 px-4 mt-8 flex-shrink-0 gallery-item" data-slider-target="image" id="9">
            <img src="https://www.boehringer-ingelheim.com/sites/default/files/boehringer-ingelheim.jpg" />
          </div>


          <div class="w-32 h-20 px-2 flex-shrink-0 gallery-item" data-slider-target="image" id="9">
            <img src="https://scontent.ffjr1-2.fna.fbcdn.net/v/t1.6435-9/52695056_2098628663537699_950779130813612032_n.jpg?_nc_cat=110&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=qDC3kJj6OggAX9OosVS&_nc_ht=scontent.ffjr1-2.fna&oh=a483ddb80b52a22a9288fde5c9ab851e&oe=615BE862" />
          </div>




          <div class="w-48 h-26 px-4  mb-8 flex-shrink-0 gallery-item" data-slider-target="GrandStore llc" id="14">
            <img src="https://media-exp1.licdn.com/dms/image/C4E0BAQG1TUvgiOAc3A/company-logo_200_200/0/1519909402568?e=1639008000&v=beta&t=CZ3yDlYLcSxGhFmCVcdIikK_v48lSsmwQ8FYZzthw-s" />
          </div>







          <div class="w-48 h-26 px-4 mt-8 flex-shrink-0 gallery-item" data-slider-target="image" id="14">
            <img src="https://www.dhcc.ae/logo/extra01.png" />
          </div>

          <div class="w-48 h-26 px-4 flex-shrink-0 gallery-item" data-slider-target="image" id="15">
            <img src="https://www.gulffloorcarpet.com/uploads/hWACgSQF/229x0_397x0/logo-gulfloor.jpg" />
          </div>

          <div class="w-48 h-26 px-4 mt-8 flex-shrink-0 gallery-item" data-slider-target="image" id="16">
            <img src="https://cdn.emiratesnbd.com/plugins/cardprivileges/images/inner_images/harvey_nicholas_logo.jpg" />
          </div>





          <div class="w-48 h-26 px-4 mt-8 flex-shrink-0 gallery-item" data-slider-target="image" id="19">
            <img src="https://www.kingspan.com/meati/assets/img/design/kingspan-logo.svg" />
          </div>















        </div>
        <div class="flex mx-auto my-3">
          <ul class="flex justify-center">
            <!-- Note that we have one <li> for each image in our gallery -->
            <li class="h-4 w-4 rounded-full mx-2 cursor-pointer bg-gray-500" data-slider-target="indicator" data-image-id="1" data-action="click->slider#scrollTo"></li>
            <li class="h-4 w-4 rounded-full mx-2 cursor-pointer bg-gray-500" data-slider-target="indicator" data-image-id="2" data-action="click->slider#scrollTo"></li>
            <li class="h-4 w-4 rounded-full mx-2 cursor-pointer bg-gray-500" data-slider-target="indicator" data-image-id="3" data-action="click->slider#scrollTo"></li>
            <li class="h-4 w-4 rounded-full mx-2 cursor-pointer bg-gray-500" data-slider-target="indicator" data-image-id="4" data-action="click->slider#scrollTo"></li>
            <li class="h-4 w-4 rounded-full mx-2 cursor-pointer bg-gray-500" data-slider-target="indicator" data-image-id="5" data-action="click->slider#scrollTo"></li>
            <li class="h-4 w-4 rounded-full mx-2 cursor-pointer bg-gray-500" data-slider-target="indicator" data-image-id="6" data-action="click->slider#scrollTo"></li>
            <li class="h-4 w-4 rounded-full mx-2 cursor-pointer bg-gray-500" data-slider-target="indicator" data-image-id="7" data-action="click->slider#scrollTo"></li>
            <li class="h-4 w-4 rounded-full mx-2 cursor-pointer bg-gray-500" data-slider-target="indicator" data-image-id="8" data-action="click->slider#scrollTo"></li>
            <li class="h-4 w-4 rounded-full mx-2 cursor-pointer bg-gray-500" data-slider-target="indicator" data-image-id="8" data-action="click->slider#scrollTo"></li>
          </ul>
        </div>
      </div>
    </main>
  </body>



   <!-- End of Slider Logo -->