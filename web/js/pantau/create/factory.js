createPantauApp.factory('formCreate', function () {
    var formData = {
        wilayah: null,
        method: null,
        content: null
    };
    var config = {};

    return {
        getData: function () {
            //You could also return specific attribute of the form data instead
            //of the entire data
            return formData;
        },
        setData: function (newFormData) {
            //You could also set specific attribute of the form data instead
            formData = newFormData
        },
        resetData: function () {
            //To be called when the data stored needs to be discarded
            formData = {};
        },
        getConfig: function () {
            //You could also return specific attribute of the form data instead
            //of the entire data
            return config;
        },
        setConfig: function (newConfig) {
            //You could also set specific attribute of the form data instead
            config = newConfig
        },
        setWilayah: function(wilayah){
            formData.wilayah = wilayah;
        },
        getWilayah: function(){
            return formData.wilayah;
        },
        setMethod: function(method){
            formData.method = method;
        },
        getMethod: function(){
            return formData.method;
        },
        setContent: function(content){
            formData.content = content;
        },
        getContent: function(){
            return formData.content;
        }
    };
});