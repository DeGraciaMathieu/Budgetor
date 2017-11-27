<template>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ol class="breadcrumb">
              <li><a href="/">Home</a></li>
              <li><a href="#">Budgets</a></li>
              <li class="active">...</li>
            </ol>
            <panels-info-budget :budget="budget"></panels-info-budget>           
            <panels-categories :categories="categories"></panels-categories>           
        </div>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return{
        }
    },
}
</script>
