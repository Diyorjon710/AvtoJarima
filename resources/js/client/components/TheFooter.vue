<template>
    <div class="footer-container">
        <div class="footer-nav">
            <div class="logo">
                <img src="/assets/img/logo-blck.png" alt="LOGO">
            </div>
            <div class="footer-items">
                <ul>
                    <li><router-link to='/'>Biz haqimizda</router-link></li>
                    <li><router-link to='/'>Jarima maydonlari</router-link></li>
                    <li><router-link to='/'>Aloqa</router-link></li>
                </ul>
            </div>
        </div>
        <div class="copyright-text">AvtoJarima, 2023</div>
    </div>
</template>

<script>
export default {
    name: "TheFooter"
}
</script>

<style scoped>

.footer-container {
    margin: 50px 250px 20px 250px;
}

.footer-nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.footer-items ul {
    display: flex;
    list-style: none;
    flex-wrap: wrap;
    margin: 0;
}

.footer-items ul li {
    margin: 0 10px;
    font-family: Inter-Regular;
    font-size: 1rem;
}

.footer-items ul li a {
    color: black;
    text-decoration: none;
    font-size: 1rem;
}

.logo {
    width: 150px;
}

.logo img {
    width: 100%;
    object-fit: cover;
}

.copyright-text {
    text-align: center;
    font-family: Inter-Regular;
    font-size: 1rem;
    opacity: 0.5;
    margin-top: 2rem;
}

</style>
