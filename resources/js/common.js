export default {
    data() {
        return {};
    },

    methods: {
        async callApi(method,url,dataObj) {
            try {
                return await axios({
                    method:method,
                    url: url,
                    data:dataObj
                });
            } catch (e) {
                return e.response 
            }
        },

        i(desc) {
            this.$Notice.info({
                title: 'Attention ! ',
                desc:desc
            });
        },
        s(desc) {
            this.$Notice.success({
                title: 'Felicitations !',
                desc:desc
            });
        },
        w(desc) {
            this.$Notice.warning({
                title: 'Attention ! ',
                desc:desc
            });
        },
        e(desc) {
            this.$Notice.error({
                title: 'Oops!',
                desc:desc
            });
        },
        swr(desc) {
            this.$Notice.error({
                title: 'Oops',
                desc:desc
            });
        }
    }
};
