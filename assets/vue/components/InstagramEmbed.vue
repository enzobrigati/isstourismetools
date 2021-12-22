<template>
  <div class="instaembed mb-4">


    <div class="container text-center">
      <h1 class="mt-4">
        Instagram Embed
        <span class="badge badge-primary">Generator</span>
      </h1>
      <p>
        Récupérez l'url de la photo ou vidéo instagram que vous voulez
        intégrer et coller la ci-dessous
      </p>
      <div class="row my-4 mx-auto">
        <div class="col-12">
          <div class="form-group">
            <input type="text" class="form-control text-center" placeholder="Url de la publication" v-model="url"/>
          </div>
          <small class="text-muted" id="password-help-block">
            L'url doit obligatoirement avoir la forme suivante : instagram.com/p/CRntF6aKS8g (<strong>attention à ne pas inclure de / à la fin</strong>)
          </small>
        </div>
      </div>

      <div class="embed mt-5 d-flex justify-content-center">
        <iframe :src="'//' + url + '/embed/'" width="500" height="710" frameborder="0" scrolling="no" allowtransparency="true"></iframe>
      </div>

      <div class="row mt-4 mb-5">
        <div class="col-12">
          <textarea class="form-control" :value="getFullUrl()" id="embedResult"></textarea>
        </div>
        <div class="col-12 mt-2">
          <button class="btn btn-primary" @click="copyResult()"><i class="fa fa-clipboard"></i> Copier le code</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "InstagramEmbed",
  data: function () {
    return {
      url: 'instagram.com/p/CRntF6aKS8g',
    }
  },
  methods: {
    getFullUrl: function () {
      return '<div class="embed d-flex"><iframe src="//' + this.url + '/embed" width="612" height="710" frameborder="0" scrolling="no" allowtransparency="true"></iframe></div>'
    },
    copyResult: function () {
      document.getElementById('embedResult').select()
      document.execCommand('copy')
      alert('Code copié dans le presse papier')
    }
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;1,100;1,400&display=swap');

.instaembed {
  font-family: 'Roboto', sans-serif;
  font-weight: lighter;
}

.toogleSizeBtn {
  font-size: 22px;
}
</style>
