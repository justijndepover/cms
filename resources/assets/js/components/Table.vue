<template>
    <div>
        <div class="toolbox">
            <button type="button" name="button" data-toggle="tooltip" data-placement="bottom" title="Duplicate items" @click="add()">
                <i class="far fa-copy"></i>
            </button>
            <button type="button" name="button">
                <i class="fas fa-print"></i>
            </button>
            <button type="button" name="button" :disabled="isItemSelected()" @click="removeDataPopup()" data-toggle="tooltip" data-placement="bottom" title="Delete items">
                <i class="far fa-trash-alt"></i>
            </button>
        </div>
        <table class="table">
            <thead>
                <th width="16"></th>
                <th v-for="key in keys" :width="key.small ? 16 : ''" :style="key.sortable ? 'cursor:pointer' : ''" v-html="parseKey(key)" @click="sort(key)"></th>
                <th width="16"></th>
                <th width="16"></th>
            </thead>
            <tbody>
                <tr v-for="item in filteredData" v-bind:class="{ 'selected': item.checked == true }">
                    <td class="show_on_hover">
                        <s-checkbox v-model="item.checked" />
                    </td>
                    <td v-for="key in keys" v-html="parseValue(item, key)"></td>
                    <td class="show_on_hover"><a href="#"><i class="far fa-edit"></i></a></td>
                    <td class="show_on_hover">
                        <button :id="'popup__' + item.id" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right" :aria-labelledby="'popup__' + item.id">
                            <li><a href="#">Bewerk</a></li>
                            <li><a @click="removeDataSingle(item.id)">Verwijder</a></li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
        <v-dialog/>
    </div>
</template>

<script>
    export default {
        props: [
            'key_url',
            'data_url'
        ],
        data() {
            return {
                keys: [],
                sorted_key: '',
                sorted_direction: 'asc',
                data: []
            }
        },
        created() {
            this.fetchKeys();
            this.fetchData();
        },
        methods: {
            fetchKeys() {
                axios.get(this.key_url).then((response) => {
                    this.keys = response.data;
                });
            },
            fetchData() {
                axios.get(this.data_url).then((response) => {
                    this.data = response.data;
                });
            },
            isItemSelected() {
                return !(this.getLength() > 0);
            },
            removeDataPopup() {
                var length = this.getLength();
                this.$modal.show('dialog', {
                    title: 'Delete',
                    text: `Are you sure you want to delete ${length} items?`,
                    buttons: [{
                        title: 'Cancel'
                    },
                    {
                        title: 'Delete',
                        default: true,
                        handler: () => {
                            this.removeData();
                        }
                    }]
                });
            },
            removeDataSingle(id) {
                this.$modal.show('dialog', {
                    title: 'Delete',
                    text: `Are you sure you want to delete 1 item?`,
                    buttons: [{
                        title: 'Cancel'
                    },
                    {
                        title: 'Delete',
                        default: true,
                        handler: () => {
                            this.removeData(id);
                        }
                    }]
                });
            },
            removeData(id = null) {
                if(id != null){
                    // remove single item
                    this.data = this.data.filter(function( item ) {
                      return item.id != id;
                    });
                } else {
                    // remove all who are checked
                    this.data = this.data.filter(function( item ) {
                      return item.checked == false;
                    });
                }
                this.$modal.hide('dialog');
            },
            add() {
                this.data.push({
                    'active': true,
                    'birthday': '1993-07-08',
                    'checked': false,
                    'id': 21,
                    'name': 'TEST'
                })
            },
            // HELPERS
            getLength() {
                return this.data.filter(item => (item.checked == true)).length;
            },
            parseKey(key) {
                if(key.sortable) {
                    if(key.key == this.sorted_key && this.sorted_direction == 'asc'){
                        return key.name + '&nbsp;&nbsp;<i class="fas fa-sort-down"></i>';
                    }
                    if(key.key == this.sorted_key && this.sorted_direction == 'desc'){
                        return key.name + '&nbsp;&nbsp;<i class="fas fa-sort-up"></i>';
                    }
                    return key.name + '&nbsp;&nbsp;<i class="fas fa-sort"></i>';
                }
                return key.name;
            },
            sort(key) {
                if(key.sortable == true) {
                    if(this.sorted_key == key.key){
                        // toggle direction
                        this.sorted_direction = (this.sorted_direction == 'asc') ? 'desc' : 'asc';
                        if(this.sorted_direction == 'asc') {
                            this.sorted_key = '';
                        }
                    } else {
                        this.sorted_key = key.key;
                        this.sorted_direction = 'asc';
                    }
                }
            },
            parseValue(item, key) {

                if(key.link != undefined && key.link != ''){
                    // link
                    var link = key.link.replace(/{{(.*?)}}/, function(){
                        return item[RegExp.$1];
                    });
                    return `<a href="${link}">${this.generateValue(item, key)}</a>`;
                }
                return this.generateValue(item, key);
            },
            generateValue(item, key) {
                // active
                if(key.type == "status" && item[key.key] == true){
                    return '<i class="fas fa-check"></i>';
                }
                if(key.type == "status" && item[key.key] == false){
                    return '<i class="fas fa-times"></i>';
                }
                return item[key.key];
            }
        },
        computed: {
            filteredData() {
                var tempData = this.data;

                if(this.sorted_key != '') {
                    tempData = _.orderBy(tempData, this.sorted_key, this.sorted_direction);
                }

                return tempData;
            }
        }
    }
</script>

<style>
.fa-check{
    color: #5be289;
}
.fa-times{
    color: #dd6565;
}
table a{
    display: block;
    text-align: center;
}
</style>