<template>
    <div class="car-info-container">
        <div class="car-info-card">
            <div class="card-left">
                <div class="card-left__img">
                    <img src="/assets/car-info-page/car.png" alt="CAR">
                </div>
            </div>
            <div class="card-right">
                <div class="card-right__info">
                    <div class="title">{{ getCarData.car_name }} {{ getCarData.car_number }}, {{ getCarData.maydon_nomi }},
                        {{ getCarData.car_jarimasi }}, {{ getCarData.car_jarima_narxi }}.</div>
                    <div class="right-info">
                        <div class="right-info__text">
                            <div class="text-key">Jarima maydoniga qabul qilingan sana:</div>
                            <div class="text-value">{{ getCarData.created_at }}</div>
                        </div>

                        <div class="right-info__text">
                            <div class="text-key">Jarima puli:</div>
                            <div class="text-value">{{ getCarData.car_jarima_narxi }}</div>
                        </div>

                        <div class="right-info__text">
                            <div class="text-key">Ma’muriy javobgarlik:</div>
                            <div class="text-value">{{ getCarData.car_jarimasi }}</div>
                        </div>

                        <div class="right-info__text">
                            <div class="text-key">Kunlik jarima maydonchasi puli:</div>
                            <div class="text-value">Hali yo'q</div>
                        </div>

                        <div class="right-info__text">
                            <div class="text-key">Maydon manzili:</div>
                            <div class="text-value">{{ getCarData.viloyat_nomi.split(' ')[0] }} sh. {{ getCarData.tuman_nomi }} t. {{ getCarData.maydon_nomi }}</div>
                        </div>

                    </div>
                    <div class="actions">
                        <div class="payment-btn">
                            <button class="btn">To'lov qilish</button>
                        </div>
                        <div class="location-btn">
                            <button class="btn">Lokatsiya</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex'

export default {
    name: "CarInfoCard",

    computed: {
        ...mapGetters(['getCarData'])
    }
}
</script>

<style scoped>

.btn {
    padding: 20px 50px;
    border-radius: 5px;
    border: none;
    font-family: Inter-Regular;
    font-size: 1rem;
    transition: ease 0.3s;
    cursor: pointer;
}

.btn:hover {
    opacity: 0.7;
}

.car-info-container {
    margin-top: 90px;
}

.car-info-card {
    width: 950px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    gap: 100px;
}

.card-left__img {
    width: 400px;
    height: 450px;
}

.card-left__img img {
    width: 100%;
    object-fit: cover;
}

.card-right__info {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: space-between;
    height: 100%;
}

.title {
    font-size: 1.5rem;
    font-family: Inter-Medium;
    line-height: 1.9rem;
}

.right-info {
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.right-info__text {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 1rem;
    font-family: Inter-Regular;
}

.text-key {
    width: 50%;
}

.text-value {
    text-align: right;
}

.actions {
    display: flex;
    gap: 20px;
}

.payment-btn button {
    background-color: var(--primary-blue);
    color: white;
}

.location-btn button {
    background-color: white;
}

</style>
