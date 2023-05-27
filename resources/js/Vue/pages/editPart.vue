<template>
    <div class="container py-5 rounded mt-5 align-items-center image-fluid bg-image" style="background-image: url('https://cdn.discordapp.com/attachments/950084997279285268/1112004675894513755/1014.jpg');">

        <div class="row">
            <div class="col-md-8 my-5 mx-auto">
                <div class="card justify-content-center">

                    <div class="card-body "> 
                        <h3 class="card-title text-center">Edit part </h3> 
                        <h2 v-if="error">{{ error.message }}</h2>
                        <form @submit.prevent="storepart">                
                            <div class="mb-3">
                                <label for="carName"  class="form-label">Name</label>
                                <input type="text" v-model="part.name"  class="form-control" id="carName">
                            
                            </div>
                            <div class="mb-3">
                                <label for="reg_num" class="form-label">Registration number</label>
                                <input type="text" v-model="part.serial_number" class="form-control" id="reg_num">
                            </div>
                            <div class="mb-3">
                                <label for="car_id" class="form-label">Car id</label>
                                <input type="number" v-model="part.car_id" class="form-control" id="car_id">
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

    let part = reactive({
        name:'',
        serial_number: '',
        car_id: null

    })

    
    let error = reactive({
        message: ''
    })
    const router = useRouter();

    const route = useRoute();
    const id = route.params.id;
    
    onMounted (()=>{
        axios.get('/api/part/'+id)
        .then((res) => {
            part.car_id = res.data.car_id
            part.name = res.data.name
            part.serial_number = res.data.serial_number
            
        }).catch((err) => {
            console.log(err);
            error.message = err.response.data.message;
        })
    })
    

    const storepart = async()=>{
        error.message = '';
        
        const response = await axios.post('/api/part/store',{part:part})
        .then((res) => {
            router.push({name:'partList'});
            
        }).catch((err) => {
            console.log(err);
            error.message =err.response.data.message ?  err.response.data.message : err.response.data
            
        })

    }
    

</script>