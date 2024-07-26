<script>
export default {
    props: {
        title: String,
    },
    watch: {
        title: {
            immediate: true,
            handler(page) {
                document.title = page;
            },
        },
    },
};
</script>

<template>
    <main>
        <header>
            <Link href="/home">Home</Link>
            <Link href="/about">About</Link>
            <Link href="/users">User</Link>
        </header>
        <article>
            <slot />
        </article>
        <footer>
            <p>&copy; Pertamina 2024</p>
        </footer>
    </main>
</template>
