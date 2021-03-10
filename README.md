                           How to Add Products in the Cart with save localStorage (Shopping Cart in VueJs + Laravel Part 2)

in before part i show how to add products in the cart 
in this part i wanna save Add Products in localStorage

lets start

step 1 - i make a variable for cart to name cartadd

by this variable we can To justify all things in the cart that come from choose by user 

so add it in data

cartadd: {
        id: "",
        name: "",
        price: "",
        image: "",
      },


step 2 - change all To justify function of added() and add the below code in added() function  

if (itemm !== undefined) {
        itemm.qty += 1;
        this.saveCats();
      } else {    
      // cartadd is here to get all things that click or chosen by user
        this.cartadd.id = item.id;
        this.cartadd.name = item.name;
        this.cartadd.price = item.price;
        this.cartadd.image = item.image;
        this.cartadd.qty = 1;
        this.cart.push(this.cartadd);
        this.cartadd = {};
        this.saveCats();  // this function most important to save all inform of products
      }
	  
	  
step 3 - add a function for save products in localStorage to name saveCats()

saveCats() {  
      // for save in local storage set the below code
      let parsed = JSON.stringify(this.cart);
      localStorage.setItem("cart", parsed);
      this.viewCart();  // by this function we can see all products are save in web
    },	


step 4 - now we wanna see all products in localstorage from shoppingCART,
 so we must make a function for see all products to name viewCart()

before put this function we must set a create to this function so before methods make a function in vue 

created() {
    this.viewCart();
  },

// we put the below code in methods
viewCart() {
      if (localStorage.getItem("cart")) {
        this.cart = JSON.parse(localStorage.getItem("cart"));
        this.badge = this.cart.length;
        this.totalprice = this.cart.reduce((total, item) => {
          return total + item.qty * item.price;
        }, 0);
      }
    },
	
	
step 5 - add the saveCats of function to remove of function 


step 6 - i wanna now add some change. 
in fact i wanna add some change for user when click will add remove button for remove button from cart


<div class="row">
                  <div class="col-md-8">
                    <div v-if="getQty(item.id) > 0">
                      <button
                        class="btn btn-danger font-italic font-weight-bold text-warning"
                        type="button"
                        v-on:click="remove(item.id)"
                      >
                        Remove from Cart
                      </button>
                    </div>
                    <div v-else>
                      <button
                        class="btn btn-success font-weight-bold text-white"
                        @click="added(item)"
                      >
                        Add to Cart
                      </button>
                    </div>
                  </div>
                </div> 
				
in next video i show how to remove or checkout Products from Cart 

dont forget subscribe
thanks				
				
				
				
				
				
				
				
				
				
				
				
				
				

step 7 - i wanna add the below code for delete one by one in the Cart

removeCart(item) {
      this.cart.splice(item,1);
      this.saveCats();
    },


<div class="co">
                <button
                            @click="removeCart(item)"
                            class="btn btn-danger btn-sm"
                          >
                           Delete
                          </button>
              </div>





<div class="col-md-4 a">
                    <h5 class="font-weight-bold"> 
                      Price:
                      <b class="text-primary">${{ item.price }}</b>
                    </h5>
                  </div>


this toturial will continue 

dont forgot to subscribe
thanks				  

 	

	  
