<template>

    <div class="navbar-nav my-2 my-lg-0 ml-auto">
        <form @submit.prevent="submitSearch">
            <div class="input-group">
                <div class="input-group-prepend">
                    <select
                        v-model="form.type"
                        aria-label="Search Type"
                        class="custom-select"
                        @change="onSearchTypeChange"
                    >
                        <option value="country">Country</option>
                        <option value="hero">Hero</option>
                    </select>
                </div>

                <input
                    type="text"
                    class="form-control"
                    v-model="form.keyword"
                    :placeholder="placeholder"
                    aria-label="Search"
                    @input="search"
                    :id="'result-dropdown' + type"
                    aria-haspopup="true"
                    aria-expanded="false"
                >

                <div class="input-group-append">
                <span class="input-group-text" @click="submitSearch">
                    <i class="fa fa-search"></i>
                </span>
                </div>

                <div class="dropdown-menu" style="width: 100%">
                    <div
                        class="dropdown-item d-flex align-items-center"
                        v-for="(item, index) in results"
                        :key="index"
                    >
                        <template v-if="form.type === 'country'">
                            <a
                                class="drop_item text-decoration-none text-dark w-100"
                                :href="'/country/' + item.slug"
                            >
                                <img
                                    style="width: 50px; height: 35px;"
                                    class="shadow-sm"
                                    :src="'/images/flags/Flag of ' + item.name + '.gif'"
                                    alt="country flag"
                                >
                                <span class="ml-3">{{ item.name }}</span>
                            </a>
                        </template>
                        <template v-else>
                            <a
                                class="drop_item text-decoration-none text-dark w-100"
                                :href="'/hero/' + item.slug"
                            >
                                <img
                                    style="width: 40px; height: 40px; border-radius: 50%"
                                    class="shadow-sm"
                                    :src="item.photo"
                                    alt="hero name"
                                >
                                <span class="ml-3">{{ item.full_name }}</span>
                            </a>
                        </template>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>

import debounce from 'lodash.debounce'

export default {
    name: "SearchBar",
    props: ['type'],
    data() {
        return {
            form: {
                keyword: '',
                type: 'country'
            },
            results: []
        }
    },
    computed: {
        placeholder() {
            return this.form.type === 'country' ? 'Search country here' : 'Search hero here';
        }
    },
    methods: {
        onSearchTypeChange() {
            this.results = [];
            this.form.keyword = '';
            $(`#result-dropdown${this.type}`).dropdown('hide');
        },
        search: debounce(function () {
            if (this.form.keyword !== '') {
                axios.post('/api/search', this.form)
                    .then(res => {
                        this.results = res.data;
                    })
                $(`#result-dropdown${this.type}`).dropdown('show');
            } else {
                $(`#result-dropdown${this.type}`).dropdown('hide');
            }
        }, 200),
        submitSearch() {
            if(this.form.type === 'country'){
                window.location.href = '/select-country?keyword=' + this.form.keyword
            } else {
                window.location.href = '/hero?keyword=' + this.form.keyword
            }
        }
    }
}
</script>

<style scoped>
input:focus, select:focus {
    box-shadow: none;
}

input, select, .input-group-text {
    border-radius: 0 !important;
}

.drop_item {
    cursor: pointer;
}
</style>
