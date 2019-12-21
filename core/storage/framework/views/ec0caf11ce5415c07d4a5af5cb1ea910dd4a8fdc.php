
<!-- popper -->
<script src="<?php echo e(asset('assets/user/js/popper.min.js')); ?>"></script>
<!-- bootstrap -->
<script src="<?php echo e(asset('assets/user/js/bootstrap.min.js')); ?>"></script>
<!-- way poin js-->
<script src="<?php echo e(asset('assets/user/js/waypoints.min.js')); ?>"></script>
<!-- owl carousel -->
<script src="<?php echo e(asset('assets/user/js/owl.carousel.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/user/js/sweetalert.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/user/js/toastr.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/user/js/jquery.datetimepicker.full.min.js')); ?>"></script>
<!-- magnific popup -->
<script src="<?php echo e(asset('assets/user/js/jquery.magnific-popup.js')); ?>"></script>
<!-- wow js-->
<script src="<?php echo e(asset('assets/user/js/wow.min.js')); ?>"></script>
<!-- counterup js-->
<script src="<?php echo e(asset('assets/user/js/jquery.counterup.min.js')); ?>"></script>
<!-- select 2 -->
<script src="<?php echo e(asset('assets/user/js/select2.min.js')); ?>"></script>
<!-- jQuery UI popup -->
<script src="<?php echo e(asset('assets/user/js/jquery-ui.js')); ?>"></script>

<script src="<?php echo e(asset('assets/plugins/bootstrap-fileinput.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/user/js/owl.carousel2.thumbs.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/user/js/particles.js')); ?>"></script>
<!-- main -->
<script src="<?php echo e(asset('assets/user/js/main.js')); ?>"></script>


<script type="text/javascript">
  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "3000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
</script>

<?php if(session('success')): ?>
<script>
    $(document).ready(function(){
        toastr["success"]("<?php echo e(session('success')); ?>");
    });
</script>
<?php endif; ?>

<?php if(session('alert')): ?>
<script>
    $(document).ready(function(){
        toastr["error"]("<?php echo e(session('alert')); ?>");
    });
</script>
<?php endif; ?>


<script>
   function increaseAdView(adID) {
      var fd = new FormData();
      fd.append('adID', adID);
      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
          }
      });
      $.ajax({
         url: '<?php echo e(route('ad.increaseAdView')); ?>',
         type: 'POST',
         data: fd,
         contentType: false,
         processData: false,
         success: function(data) {
            // console.log(data);
         }
      });
   }
</script>

<?php echo $__env->yieldPushContent('scripts'); ?>

<?php echo $__env->yieldContent('js-scripts'); ?>

<?php echo $__env->yieldContent('stripe-js'); ?>

<?php echo $__env->yieldContent('preimgscripts'); ?>

<?php echo $__env->yieldContent('vuescripts'); ?>

<?php
  if (Auth::check()) {
    $sessionid = Auth::user()->id;
  } else {
    $sessionid = session()->get('browserid');
  }
?>


  <script>
  <?php if(request()->is('vendor/product/*/edit')): ?>
  var catid = <?php echo e($product->category_id); ?>;
  var subcatid = <?php echo e($product->subcategory_id); ?>;
  <?php else: ?>
  var catid = null;
  var subcatid = null;
  <?php endif; ?>
  var example1 = new Vue({
    el: '#app',
    data: {
      products: [],
      noproduct: true,
      checkoutbtn: false,
      preimg: '',
      precartlen: 0,
      catid: catid,
      subcatid: subcatid,
      iteratoroptions: [],
      options: [],
      productattrs: [],
      itemsCount: 0,
      cartQuantity: 0,
      basecurrsym: '<?php echo e($gs->base_curr_symbol); ?>'
    },
    mounted() {
      this.precartlen = <?php echo e(Auth::check() ? \App\Cart::where('cart_id', Auth::user()->id)->count() : \App\Cart::where('cart_id', session('browserid'))->count()); ?>;
      this.cartQuantity = <?php echo e(Auth::check() ? \App\Cart::where('cart_id', Auth::user()->id)->sum('quantity') : \App\Cart::where('cart_id', session('browserid'))->sum('quantity')); ?>;
      this.itemsCount = this.cartQuantity;
      if (this.precartlen > 0) {
        this.noproduct = false;
        this.checkoutbtn = true;
      }

    },
    methods: {
      addtocart(productid, quantity) {
        console.log(productid, quantity);
        var fd = new FormData(document.getElementById('attrform'));
        fd.append('productid', productid);
        fd.append('quantity', quantity);
        fd.append('attribute_helper', '');
        $.ajax({
          url: '<?php echo e(route('user.cart.getproductdetails')); ?>',
          type: 'POST',
          data: fd,
          contentType: false,
          processData: false,
          success: (data) => {
            console.log(data);

            document.getElementById('errattr').innerHTML = '';
            if(typeof data.error != 'undefined') {
              if (typeof data.attribute_helper != 'undefined') {
                document.getElementById('errattr').innerHTML = data.attribute_helper[0];
              }
            }
            if (data.status == 'productadded') {
              // console.log(data.product.cartattr);
              this.products.push(data.product);
              this.itemsCount = parseInt(this.itemsCount) + parseInt(data.quantity);
              if ((this.precartlen + this.products.length) > 0) {
                this.noproduct = false;
                this.checkoutbtn = true;
              }
              if (data.stock == 0) {
                $("#stock").html("Out of stock");
                $("#stock").removeClass("base-color");
                $("#stock").addClass("text-danger");
              }
              // Fire toastr
              toastr["success"]("<strong>Success!</strong> Added to cart!");
            } else if (data.status == 'shortage') {
              toastr["error"]("<strong>Sorry!</strong> Vendor has "+ data.quantity +" items left for this product!");
            } else if (data.status == 'removed') {
              toastr["error"]("<strong>Sorry!</strong> Vendor has removed this product!");
            } else if (data.status == 'quantityincr') {
              $("#quantity"+data.product.cart_id).html('('+data.quantity+')');
              if (!data.product.current_price) {
                var price = parseFloat(data.product.price)*parseFloat(data.quantity);
                console.log(price);
                $("#price"+data.product.cart_id).html(this.basecurrsym + ' ' + price);
              } else {
                var offered_price = parseFloat(data.product.current_price)*parseFloat(data.quantity);
                var prev_price = parseFloat(data.product.price)*parseFloat(data.quantity);
                console.log(offered_price, prev_price);
                $("#price"+data.product.cart_id).html(this.basecurrsym + ' ' + offered_price);
                $("#delprice"+data.product.cart_id).html(this.basecurrsym + ' ' + prev_price);
              }
              this.itemsCount = parseInt(this.itemsCount) + parseInt(data.product.quantity);
              toastr["success"]("<strong>Success!</strong> Added to cart!");
            }
          }
        });

      },

      removeproduct(cartid) {
        console.log(cartid);
        $.get(
          '<?php echo e(route('cart.remove')); ?>',
          {
            cartid: cartid
          },
          (data) => {
            console.log(data);
            $("#singleitem"+cartid).remove();
            <?php if(request()->path() == 'cart'): ?>
              $("#tr"+cartid).remove();
              // Change total and subtotal in DOM
              $("#subtotal").html(curr + " " + data.subtotal);
              $("#total").html(curr + " " + data.total);
            <?php endif; ?>
            <?php if(request()->path() == 'checkout'): ?>
              $("#li"+cartid).remove();
              // Change total and subtotal in DOM
              $("#subtotal").html(curr + " " + data.subtotal);
              $("#total").html(curr + " " + data.total);
            <?php endif; ?>
            if (data.status == "removed") {
              $("#itemsCountJquery").removeClass('d-block');
              $("#itemsCountJquery").addClass('d-none');
              $("#itemsCountVue").removeClass('d-none');
              $("#itemsCountVue").addClass('d-block');
              this.itemsCount = data.quantity;
              if ((this.precartlen + this.products.length) == 0) {
                this.noproduct = true;
                this.checkoutbtn = false;
              }
              if (data.stock > 0) {
                $("#stock").html("In stock");
                $("#stock").removeClass("text-danger");
                $("#stock").addClass("base-color");
              }
            }
          }
        );
      },

      showsubcats: function() {
        console.log(this.catid);
        $.get(
          '<?php echo e(route('vendor.product.getsubcats')); ?>',
          {
            catid: this.catid
          },
          function(data) {
            console.log(data);
            var subopt = '<option value="" selected disabled>Select a subcategory</option>';
            for (var i = 0; i < data.length; i++) {
              subopt += `
                <option value="${data[i].id}">${data[i].name}</option>
              `;
            }
            $("#selsub").html(subopt);
          }
        );
      },

      showattrs: function() {
        console.log(this.subcatid);
        $.get(
          '<?php echo e(route('vendor.product.getattributes')); ?>',
          {
            'subcatid': this.subcatid
          },
          function(data) {
            console.log(data);
            if (data != 'no_attr') {
              this.iteratoroptions = data.iteratoroptions;
              this.options = data.options;
              this.productattrs = data.productattrs;
              console.log(this.iteratoroptions, this.options, this.productattrs);
              var txt = ``;
              var k = 0;
              for (var i = 0; i < this.iteratoroptions.length; i++) {
                  if ((i+1) % 3 == 1) {
                    txt += `<div class="row">`;
                  }
                        txt += `<div class="col-md-4">
                                     <div class="form-element margin-bottom-20">
                                          <label>${this.productattrs[i].name} <span>**</span></label>`;

                                  txt += `<div>`;
                                for (var j = 0; j < this.iteratoroptions[i]; j++) {
                                    txt += `<div class="form-check form-check-inline">
                                              <input name="${this.productattrs[i].attrname}[]" value="${this.options[k].name}" class="form-check-input" type="checkbox" id="attr${this.options[k].id}">
                                              <label class="form-check-label" for="inlineCheckbox1">${this.options[k].name}</label>
                                            </div>`;
                                    k++;
                                }
                            txt +=      `</div>
                                         <p class="em text-danger no-margin" id="err${this.productattrs[i].attrname}"></p>
                                     </div>
                                </div>`;
                  if ((i+1) % 3 == 0) {
                    txt += `</div>`;
                  }
              }
              $("#proattrsid").html(txt);
            } else {
              $("#proattrsid").html('');
            }

          }
        );
      }
    }
  })
  </script>

<script>
  function subscribe(e) {
    e.preventDefault();
    var fd = new FormData(document.getElementById('subscribeForm'));
    $.ajax({
      url: '<?php echo e(route('user.subscribe')); ?>',
      type: 'POST',
      data: fd,
      contentType: false,
      processData: false,
      success: function(data) {
        console.log(data);
        if(typeof data.error != 'undefined') {
          if (typeof data.email != 'undefined') {
            toastr["error"](data.email[0]);
          }
        }
        if (data == "success") {
            toastr["success"]("You have subscribed successfully!");
            document.getElementById('subscribeForm').reset();
        }
      }
    });
  }
</script>
<script>
  function categoryChange(catid) {
    window.location = '<?php echo e(url('/')); ?>' + '/shop/' + catid;
  }
</script>
