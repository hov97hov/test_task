<template>
    <div>
        <div class="container">
            <div class="search-content">
                <input v-model="search" type="text" placeholder="Search">
                <i class="fa fa-search" aria-hidden="true"></i>
            </div>
            <div class="table-content" v-if="this.marks">
               <div class="marks-content" v-for="(item) in this.marks">
                   <div class="marks-item">
                       <h2>{{item.title}}</h2>
                       <img :src="'/uploads/'+item.image" alt="">
                   </div>
                    <div class="car-models">
                        <div class="row">
                            <div class="col-3" v-for="(carModel) in item.car_models">
                                <a :href="'/car-model/'+ carModel.id" class="car-model-href">
                                    <div class="car-model">
                                        <div class="car-model-img-content">
                                            <img v-if="carModel && carModel.attachments.length > 0" :src="'/uploads/'+carModel.attachments[0].image" alt="">
                                        </div>
                                        <div class="car-model-title">
                                            {{carModel.title}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "home",
    data: () => {
        return {
            search: '',
            marks: [],
        }
    },
    watch: {
        search: function () {
            this.getMarks(this.search)
        },
    },
    async created() {
        await this.getMarks(this.search)
    },
    methods: {
        async getMarks(search) {
            try {
                const response = await axios.post("/get-marks", {search:search});
                this.marks = response.data
            }
            catch (error) {
                console.log(error);
            }
        }
    }
}
</script>

<style scoped>
    .table-content {
        margin-top: 20px;
    }
    .search-content {
        display: flex;
        justify-content: flex-end;
        margin-top: 50px;
        position: relative;
    }
    .search-content i {
        position: absolute;
        font-size: 18px;
        right: 10px;
        top: 8px;
    }
    .search-content input {
        outline: none;
        padding: 5px 15px;
        border-radius: 10px;
        border: 1px solid #000000;
    }
    .marks-content {
        margin: 30px 0;
        padding-bottom: 20px;
        border-bottom: 1px solid #dddddd;
    }
    .marks-item {
        display: flex;
    }
    .marks-item h2 {
        font-weight: bold;
        font-size: 36px;
        margin: 0 0 50px;
    }
    .marks-item img {
        width: 40px;
        height: 40px;
        margin-left: 10px;
    }
    .car-model-href {
        display: block;
        text-decoration: none;
        color: #000000;
    }
    .car-model {
        cursor: pointer;
        box-shadow: 0px 0px 15px -3px rgba(0,0,0,0.1);
    }
    .car-model .car-model-title {
        font-size: 26px;
        font-weight: bold;
        padding: 15px;
    }
    .car-model .car-model-img-content img {
        width: 100%;
    }
</style>
