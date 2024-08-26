export function formatDate(date, opts) {
    if (!opts) {
        opts = {
            dateStyle: "full",
            timeStyle: "long",
        };
    }
    console.log(date);
    return new Intl.DateTimeFormat("id-ID", opts).format(new Date(date));
}
