<template>
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <panels-budgets :budgets="budgets"></panels-budgets>
            </div>
        </div>
    </div>
    <modals-create-budget :budgets="budgets"></modals-create-budget>
</div>
</template>

<script>
export default {
    data(){
        return{
            budgets: [],
        }
    },
    created: function()
    {
        this.fetchData();
    },
    methods: {
        fetchData: function()
        {
            axios.get(`/api/budget/all`).then(response => {
                this.budgets = response.data;
            })
            .catch(e => {});
        },
    }      
}
</script>
