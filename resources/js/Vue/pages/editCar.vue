<template>
    <div class="container py-5 rounded mt-5 align-items-center image-fluid bg-image" style="background-image: url('https://cdn.discordapp.com/attachments/950084997279285268/1112004675894513755/1014.jpg');">

        <div class="row">
            <div class="col-md-8 my-5 mx-auto">
                <div class="card justify-content-center">

                    <div class="card-body "> 
                        <h3 class="card-title text-center">Edit Car </h3> 
                        <h2 v-if="error">{{ error.message }}</h2>
                        <form @submit.prevent="tryTostore">                
                        <div class="mb-3">
                            <label for="carName"  class="form-label">Name</label>
                            <input type="text" v-model="car.name"  class="form-control" id="carName">
                        
                        </div>
                            <div class="mb-3">
                                <label for="reg_num" class="form-label">Registration number</label>
                                <input type="text" v-model="car.registration_number" class="form-control" id="reg_num">
                            </div>
                            <div class="mb-3 form-check">
                                
                                <input type="checkbox" v-model="car.is_registered"  class="form-check-input" id="exampleCheck1">
                                
                                <label class="form-check-label" for="exampleCheck1">Registered</label>

                            </div>
                            <div class="justify-content-center text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            </form>
                            
                    </div>
                </div>


                    
            </div>
        </div>
        

    </div>
</template>

<script setup>
    import axios from 'axios';

    import {reactive,onMounted} from 'vue';
    import { useRouter,useRoute } from 'vue-router';

    const props = defineProps({});

    let car = reactive({
        id: 0 ,
        name:'',
        registration_number: '',
        is_registered: false,

    })
    let error = reactive({
        message: ''
    })
    const router = useRouter();

    const route = useRoute();
    const id = route.params.id;
    
    onMounted (()=>{
        axios.get('/api/car/'+id)
        .then((res) => {
            car.name = res.data.name,
            car.id = res.data.id,
            car.registration_number = res.data.registration_number
            car.is_registered = res.data.is_registered == 0 ? false :true;
        }).catch((err) => {
            error.message = err.response.data.message;
        })
    })
    

    let valid = ()=>{
         
        if( car.registration_number.length > 0 && car.is_registered==false){
           return false ;
        }
        else return true
    }
    const tryTostore = ()=>{
    
        if (valid()) {
            storecar()
        }
        else{
            error.message = 'Cannot add registration number to car thats not registered'
        }
    }

    const storecar = async()=>{

        error.message = '';
        const response = await axios.put('/api/car/'+car.id,{car:car})
        .then((res) => {
            router.push({name:'carList'})
        }).catch((err) => {
            error.message = err.response.data.message;
        })
    }
    

</script>