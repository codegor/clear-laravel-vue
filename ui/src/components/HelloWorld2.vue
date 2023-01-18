<script>
  import text from './text.js';

  export default {
    data() {
      return {
        text: text,
        result: {
          common: '-',
          longest: '-',
          least: '-',
          total: '-',
          spec: '-',
        },
      };
    },
    methods: {
      parse() {
        let temp = this.text.replaceAll('\n', ' ');
        const l = temp.length;
        temp = temp.replace(/[\:\;\,\?\!\*\(\)\&\“\”\[\]]/g, '');
        temp = temp.replace(/ \/ /g, '');
        temp = temp.replace(/\. /g, ' ');
        temp = temp.replace(/ \./g, ' ');
        this.result.spec = l - temp.length;
        while(-1 !== temp.search('  ')) {
          temp = temp.replaceAll('  ', ' ');
        }
        const words = temp.split(' ');
        this.result.total = temp.replaceAll(' ', '').length;
        const index = words.map(i => i.toLowerCase()).reduce((acc, v) => {
          acc[v] = acc[v] ? acc[v] + 1 : 1;
          return acc;
        }, {});
        const sorted = Object.entries(index).map(i => i.push(i[0].length) && i);
        sorted.sort((a, b) =>
          a[1] === b[1]
          ? 0
          : a[1] > b[1]
            ? -1
            : 1
        );
        this.result.common = sorted
          .filter(([, , lngth]) => 3 < lngth)
          .slice(0, 5)
          .reduce((acc, [word, count]) => acc.push(word + ` (${count} times)`) && acc, [])
          .join(', ');
        this.result.least = sorted
          .sort((a, b) =>
            a[1] === b[1]
            ? 0
            : a[1] > b[1]
              ? 1
              : -1
          )
          .slice(0, 5)
          .reduce((acc, [word]) => acc.push(word) && acc, [])
          .join(', ');
        this.result.longest = sorted
          .sort((a, b) =>
            a[2] === b[2]
            ? a[1] === b[1]
              ? 0
              : a[1] > b[1]
                ? 1
                : -1
            : a[2] > b[2]
              ? -1
              : 1
          )
          .slice(0, 5)
          .reduce((acc, [word, , lngth]) => acc.push(word + ` (${lngth} symbols)`) && acc, [])
          .join(', ');
      }
    }
  };
</script>

<template>
  <div>
    <div>
      1. Top 5 most common words (with > 3 characters): {{ result.common }} <br/>
      2. Top 5 longest words: {{ result.longest }} <br/>
      3. Top 5 least common words: {{ result.least }} <br/>
      4. Total number of letters: {{ result.total }} <br/>
      5. Number of total special chars . & ,: {{ result.spec }} <br/>
    </div>

    <div>
      Text: <textarea v-model="text"/><br/>
      <button @click="parse">Parse</button>
    </div>
  </div>
</template>

<style scoped>
a {
  color: #42b983;
}
</style>
