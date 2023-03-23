export default {
    data() {
        return {};
    },
    methods: {
        async callApi(method, url, dataObj) {
            try {
                return await axios({
                    method: method,
                    url: url,
                    data: dataObj,
                });
            } catch (error) {
                return error.response;
            }
        },
        i(desc, title) {
            this.$Notice.info({
                title: "Notification title",
                desc: "Here is the notification description. Here is the notification description. ",
            });
        },
        s(desc, title = "success") {
            this.$Notice.success({
                title: title,
                desc: desc,
            });
        },
        w(desc, title = "Warning") {
            this.$Notice.warning({
                title: title,
                desc: desc,
            });
            
        },
        e(desc, title = "error") {
            this.$Notice.error({
                title: title,
                desc:desc,
            });
        },
    },
};