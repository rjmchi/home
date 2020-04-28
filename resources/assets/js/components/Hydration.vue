<template>
  <div>
	<form @submit.prevent class="hydration" method="post">
	
		<label for="starter">Starter: </label>
		<input type="text" name="starter" v-model="starter">
		<label for="flour">Flour</label>
		<input type="text" name="flour" v-model="flour">
		<label for="water">Water</label>
		<input type="text" name="water" v-model="water">	
	</form>


	<div v-show="hydrationPercent > 0" class="hydration">
	<p>Hydration = {{hydrationPercent}} %</p>
	<p>Starter %: {{starterPercent}}</p>
	<p>Total Flour: {{totalFlour}}</p>
	<p>Total Water: {{totalWater}}</p>
	</div>

  </div>
</template>

<script>

export default {
  data () {
    return {
		starter: 0,
		flour: 0,
		water:0,
    }
  },
  computed: {
  	totalFlour: function() {
		return parseInt(this.flour) + (this.starter/2);
	},
	totalWater: function() {
		return parseInt(this.water) + (this.starter/2);
	},
	hydrationPercent: function() {
		return this.totalWater/this.totalFlour * 100;
	},
	starterPercent: function() {
		return this.starter/this.flour * 100;
	}
  },
  methods: {

  },

  created() {

  },
}
</script>

<style lang="scss" scoped>
</style>