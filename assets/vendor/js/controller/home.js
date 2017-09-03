var app = new Vue({
    el: '#app',
    delimiters: ['${', '}'],
    data: {
        contacts: []
    },
    created: function() {
        var vm = this;
        fetch('http://medzoner.dev:9061/api/contact')
            .then(function(response) {
                return response.json()
                    .then(function(json) {
                        vm.contacts = json
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            })
            .catch(function(error) {
                console.log(error);
            });
    }
});
