<template>
 <div>
  <b-button v-b-modal.modal-1>Launch demo modal</b-button>

  <b-modal id="modal-1" title="BootstrapVue">
    <p class="my-4">Hello from modal!</p>
  </b-modal>
</div>
</template>

<script>
function findById(arr, id) {
  return arr.find(x => x.id === id)
}
export default {
  data() {
    return {
      cart: [], // cart is a variable already
      selling: [
        {
          id: 1,
          image: "//placehold.it/200",
          name: "Doo-dad",
          price: 999,
        },
        {
          id: 2,
          image: "//placehold.it/200",
          name: "Other Thing",
          price: 1499,
        },
        {
          id: 3,
          image: "//placehold.it/200",
          name: "An Item",
          price: 499,
        },
        {
          id: 4,
          image: "//placehold.it/200",
          name: "Thing",
          price: 299,
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
  },
  methods: {
    addToCart: function (e) {
      var i;
      var item;

      for (i = 0; i < this.selling.length; i++) {
        if (this.selling[i].id == e.target.getAttribute("data-id")) {
          this.cart.push(this.selling[i]);
          break;
        }
      }
    },
     plusQty: function(item){
       item.price = 1;
      
       item.total *= item.price;
    },

    add: function(item) {
      var item = findById(this.cart, item.id)
      if (item !== undefined) {
        item.qty += 1
      } else {
        this.cart.push({id: id, qty: 1, price: 50})
      }
    },
    
    deleteEvent: function (index) {
     // write cart in here and i took this name from    
      this.cart.splice(index, 1);
    },	
  },
};
</script>

<style scoped>
.qty-plus {
        float: left;
        width: 20px;
        line-height: 100px;
        margin-left: 20px;
        text-align: center;
        cursor: pointer;
      }
</style>