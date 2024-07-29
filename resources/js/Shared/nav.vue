<script>
export default {
    methods: {
        toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            if (sidebar.style.width === "250px") {
                sidebar.style.width = "0";
            } else {
                sidebar.style.width = "250px";
            }
        },
        closeSidebar() {
            const sidebar = document.getElementById("sidebar");
            sidebar.style.width = "0";
        },
    },
};
</script>
<template>
    <nav class="navbar">
        <div class="menu-icon" @click="toggleSidebar">
            <font-awesome-icon icon="bars" />
        </div>
        <img
            class="logo"
            src="../../../public/images/pertamina.png"
            alt="logo"
        />
        <div class="user-icon">
            <font-awesome-icon icon="user" />
        </div>
    </nav>
    <div class="sidebar" id="sidebar">
        <a href="javascript:void(0)" class="closebtn" @click="closeSidebar">
            <font-awesome-icon
                icon="circle-xmark"
                class="fa-2xl"
                style="color: #ffffff"
            />
        </a>
        <ul>
            <li><Link href="/">Home</Link></li>
            <li><Link href="/dashboard">Dashboard</Link></li>
            <li><Link href="/analysis">Analysis</Link></li>
        </ul>
    </div>
</template>

<style scoped>
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: black;
    border-bottom: 2px solid red;
    padding: 10px;
    color: white;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    width: 100%;
    z-index: 1;
}

.logo {
    width: 125px;
    margin: 20px;
}

.menu-icon {
    margin: 20px;
    font-size: 24px;
    cursor: pointer;
}

.user-icon {
    margin: 25px;
    font-size: 24px;
    cursor: pointer;
}

.sidebar {
    height: 100%;
    width: 0;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #000000;
    z-index: 3;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    color: white;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
}

.sidebar ul li {
    text-align: center;
}

.sidebar ul li a {
    padding: 15px;
    margin: 0 20px 0 20px;
    border-radius: 10px;
    color: white;
    text-decoration: none;
    display: block;
    transition: 0.3s;
}

.sidebar ul li a:hover {
    background-color: #460606;
}

.closebtn {
    position: absolute;
    top: 20px;
    left: 20px;
    text-align: left;
}
</style>
