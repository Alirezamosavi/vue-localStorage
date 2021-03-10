<template>
  <!-- name of Vue app is "app" -->
  <div class="container">
    <h1>
      <b
        >How to Add products to the cart <span style="color: green"> VueJs </span>+
        <span style="color: blue">Laravel</span></b
      >
    </h1>
    <div id="myDIV" class="hide">
      <div class="row">
        <table class="table">
          <button type="button" class="btn btn-success" @click="back()">
            Continue to Shopping
          </button>
        </table>
      </div>
      <div
        class=""
        v-for="item in cart"
        :key="item.id"
        style="display: contents"
      >
        <div class="card" style="align-items: center">
          <img
            :src="`${item.image}`"
            class="figure-img img-fluid"
            width="40%"
          />
          <p>
            <b>{{ item.name }}</b>
          </p>
          <div class="p-3 border bg-light">
            <h3>Price: ${{ item.price * item.qty }}</h3>
          </div>
          <div class="row">
            <div class="col">
              <button
                type="button"
                class="btn btn-success"
                @click="added(item)"
              >
                +
              </button>
            </div>
            <div class="col">
              <h3><span v-text="getQty(item.id)"></span></h3>
            </div>
            <div class="col">
              <button
                class="btn btn-warning"
                type="button"
                v-on:click="remove(item.id)"
              >
                -
              </button>
            </div>
          </div>
        </div>
      </div>

      <div v-if="!totalItem == 0">
        <h3>
          <b>Cart Total: ${{ totalItem }}</b>
        </h3>
      </div>

      <h1 class="bg-warning text-center" v-else>No Added left!</h1>
    </div>

    <br /><br />
    <!-- this is main page -->
    <div class="page">
      <b-button
        variant="danger"
        @click="Card"
        v-b-modal.modal-1
        data-target="#modal-1"
      >
        <h3>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="26"
            height="26"
            fill="currentColor"
            class="bi bi-cart"
            viewBox="0 0 16 16"
          >
            <path
              d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
            /></svg
          >&nbsp;{{ cart.length }}
        </h3>
      </b-button>
      <!-- start -->
      <div class="row page mt-3">
        <div class="col-sm-4" v-for="item in selling" :key="item.id">
          <div class="card hover text-center">
            <div class="card-body">
              <img
                :src="`${item.image}`"
                class="figure-img img-fluid"
                width="40%"
              />

              <div>
                <p>
                  <b>{{ item.name }}</b>
                </p>
                <div class="row">
                  <div class="col-md-4">
                    <button
                      type="button"
                      class="btn btn-success"
                      @click="added(item)"
                    >
                      +
                    </button>
                  </div>

                  <div class="col-md-4">
                    <h3 class="mt-2" v-text="getQty(item.id)"></h3>
                  </div>
                  <div class="col-md-4">
                    <button
                      class="btn btn-warning"
                      type="button"
                      v-on:click="remove(item.id)"
                    >
                      -
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- End row -->
  </div>
  <!-- #/container  cart -->
</template>

<script>
function findById(arr, id) {
  return arr.find((x) => x.id === id);
}
export default {
  data() {
    return {
      cart: [],
      selling: [
        {
          id: 1,
          image:
            "https://thermaltake.azureedge.net/pub/media/catalog/product/cache/cff8144a2156fdaedfb0b91d200e5398/l/2/l20m01.jpg",
          name: "hama MC-200 Maus kabelgebunden schwarz",
          price: "9",
        },
        {
          id: 2,
          image:
            "https://in-media.apjonlinecdn.com/catalog/product/cache/b3b166914d87ce343d4dc5ec5117b502/h/2/h2c21aa.png",
          name: "HP optische USB-Scroll-Maus ( QY777AA )",
          price: "8",
        },
        {
          id: 3,
          image: "https://assets.logitech.com/assets/65015/fiji-3-bt-m557.png",
          name: "Bluetooth Mouse Controller M557",
          price: "8",
        },

        {
          id: 4,
          image:
            "https://target.scene7.com/is/image/Target/GUEST_62a4c76c-20de-4f4b-a346-9d161208fbdf?wid=325&hei=325&qlt=80&fmt=webp",
          name: "Logitech M100 Wired Mouse - Black (910-001601)",
          price: "4",
        },
        {
          id: 5,
          image:
            "https://images.philips.com/is/image/PhilipsConsumer/SPK7314_00-IMS-en_ID?wid=420&hei=360&$jpglarge$",
          name: "Hama MC-200 Maus kabelgebunden schwarz",
          price: "9",
        },
        {
          id: 6,
          image:
            "https://img01.honorfile.com/eu/de/honor/pms/product/8149110002201/428_428_5B4E8F56F2CD0A82323596BE134BEFE7697CE0CEE21ABDD5mp.jpg",
          name: "Anywhere wireless portability A comfortable",
          price: "9",
        },
      ],
    };
  },
  computed: {
    cartTotal: function () {
      var i;
      var total = 0;

      for (i = 0; i < this.cart.length; i++) {
        total += this.cart[i].price;
      }

      return total;
    },
    totalItem: function () {
      let sum = 0;
      let summ = 0;
      this.cart.forEach(function (item) {
        var sum = item.price;
        summ += sum * parseFloat(item.qty);
        if (summ < 1) {
          $(".modal").hide();
        }
      });

      return summ;
    },
  },
  methods: {
    getQty(id) {
      var item = findById(this.cart, id);
      if (item !== undefined) return item.qty;
      else return 0;
    },
    added(item) {  // when user chhose a buy, this function add that in cart
      var total = 0;
      var itemm = findById(this.cart, item.id);
      if (itemm !== undefined) {
        itemm.qty += 1;
      } else {
        this.cart.push({ // this part push name, quantity, image, price according id in cart
          id: item.id,
          name: item.name,
          qty: 1,
          image: item.image,

          price: item.price,
        });
      }
    },

    remove(id) {
      var item = findById(this.cart, id);
      if (item !== undefined) {
        item.qty -= 1;
        if (item.qty <= 0) {
          var index = this.cart.indexOf(item);
          this.cart.splice(index, 1);
        }
      }
    },

    Card() {
      $("#myDIV").toggleClass("hide").fadeTo("slow");
      $(".page").addClass("hide");
    },

    back() {
      $("#myDIV").addClass("hide");
      $(".page").removeClass("hide");
    },
  },
};
</script>

<style>
.card:hover a {
  background: green;
  transition: 1.5s ease;
  transform: translate(-0.1%, -0.1%);
}
.hover:hover {
  box-shadow: 0 2px 5px 0, 0 2px 10px 0 rgba(0, 0, 0, 0.12);
}

#myDIV {
  width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color: lightblue;
  margin-top: 20px;
}
.hide {
  display: none !important;
  visibility: hidden !important;
}

h1 {
  font-family: "Times New Roman", Times, serif;
  font-size: 50px;
  color: #000;
  text-align: center;
}
</style>