<template>
  <div class="aloaembed">
    <div class="container text-center">
      <h1 class="mt-4">
        Aloa Embed
        <span class="badge badge-danger">Generator</span>
      </h1>
      <p>
        Récupérez l'identifiant du produit que vous voulez intégrer et collez
          le ci-dessous
      </p>
      <div class="row my-4 mx-auto">
        <div class="col-12">
          <input type="text"
                 class="form-control text-center"
                 placeholder="Identifiant du produit"
                 v-model="productId"
          />
          <small id="password-help-block">
            L'identifiant du produit doit obligatoirement être un chiffre
          </small>
        </div>
        <div class="col-6 mt-2">
          <input
              class="form-control text-center"
              type="number"
              placeholder="Largeur personnalisée"
              v-model="width"
          />
          <small>
            Largeur personnalisée %
          </small>
        </div>
        <div class="col-6 mt-2">
          <input
              class="form-control text-center"
              type="number"
              placeholder="Hauteur personnalisée"
              v-model="height"
          />
          <small>
            Hauteur personnalisée en pixel
          </small>
        </div>
        <div class="col-12 mt-2">
          <button class="btn btn-primary" @click="resetSize()">Réinitialiser la taille</button>
        </div>
      </div>

      <div class="embed mt-5">
        <iframe
            id="widgetAloa"
            title="Aloa Vente En Ligne"
            :width="width + '%'"
            :height="height + 'px'"
            border="0"
            :src="
            'https://otislesurlasorgue.consonanceweb.fr/api/?produitId=' +
              productId +
              '&application=Boutique&entity=Produit&api_user=86GmL5hXw&api_key=81ba1227-0c37-463f-9b05-185bde919eed&subdomainForce=otislesurlasorgue&EntiteIdForce=1&action=produitDetail&widgetId=1'
          "
            style="border: none"
        ></iframe>
      </div>

      <div class="row mt-4 mb-5">
        <div class="col-12">
          <textarea class="form-control"
              :value="getFullUrl()"
              id="embedResult"
              rows="4"
          ></textarea>
        </div>
        <div class="col-12 mt-2">
          <button class="btn btn-primary" @click="copyResult()">
            <i class="fa fa-clipboard"></i>
            Copier le code
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "AloaEmbed",
  data: function() {
    return {
      productId: 4,
      width: 100,
      height: 500,
    };
  },
  methods: {
    getFullUrl: function() {
      return (
          '<iframe id="widgetAloa" title="Aloa Vente En Ligne" width="' +
          this.width +
          '%" height="' +
          this.height +
          'px" border="0" src="https://otislesurlasorgue.consonanceweb.fr/api/?produitId=' +
          this.productId +
          '&application=Boutique&entity=Produit&api_user=86GmL5hXw&api_key=81ba1227-0c37-463f-9b05-185bde919eed&subdomainForce=otislesurlasorgue&EntiteIdForce=1&action=produitDetail&widgetId=1" style="border: none"></iframe>'
      );
    },
    resetSize: function() {
      this.width = 100;
      this.height = 500;
    },
    copyResult: function() {
      document.getElementById("embedResult").select();
      document.execCommand("copy");
      alert("Code copié dans le presse papier");
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;1,100;1,400&display=swap');
.aloaembed {
  font-family: 'Roboto', sans-serif;
  font-weight: lighter;
}
.toogleSizeBtn {
  font-size: 22px;
}
</style>
