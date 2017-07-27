<template>
  <v-app id="mainApp"
    :dark="dark"
    :light="!dark"
     standalone>
    <main style="min-height:95vh;">
      <v-container fluid fill-height>
        <v-layout>
          <v-flex  offset-xs0 xs12 offset-sm1 sm10 offset-md2 md8>
            <v-card  class="mt-5 mb-5">
              <v-card-text>
               <v-container fluid>
                 <v-layout row wrap>
                   <v-select
                   :dark="dark"
                   :light="!dark"
                     label="Artist list"
                     v-bind:items="artistList"
                     v-model="selected"
                     multiple
                     chips
                     hint="Pick two or more artists"
                     persistent-hint
                     autocomplete
                     auto
                     @input="updateList"
                   ></v-select>
               </v-layout>
               <v-list two-line>
                <v-list-tile class="customPadding" avatar ripple v-for="(song, index) in songList" v-bind:key="song">
                  <v-list-tile-content >
                    <v-list-tile-title class="bolderText">{{ song.songName }}</v-list-tile-title>
                    <v-list-tile-sub-title class="boldText">By : {{ song.mainArtist }}</v-list-tile-sub-title>
                    <v-list-tile-sub-title>Feat. {{ song.secondaryArtistList.join() }}</v-list-tile-sub-title>
                  </v-list-tile-content>
                  <v-divider v-if="index + 1 < songList.length"></v-divider>
                </v-list-tile>
              </v-list>
              </v-container>
            </v-card-text>
            <!-- <v-btn  @click.native="addData" class="mb-5" left primary >Add data</v-btn>-->
            </v-card>
          </v-flex>
        </v-layout>
        <!--v-router-->
      </v-container>
    </main>
    <v-footer >

      <v-switch @click.native="saveCookieTheme" primary label="Change theme"  v-model="dark" class="paddingTop"></v-switch>

    </v-footer>


  </v-app>
</template>

<script>
  export default {
    data () {
      return {
        artistList:[],
        dark:(window.localStorage.getItem('themeColor' == 'true')),
        selected:[],
        songList:[]
      }
    },
    //Get artist list
    created(){
        //TODO: to be fixed
      if(typeof(Storage) !== "undefined") {
        console.log("get saved data");
        console.log(window.localStorage.getItem('themeColor'));
        this.dark =  (window.localStorage.getItem('themeColor' == 'true'));
      }

      Axios.get(`/collabs/Routing/getArtistList.php?safe_key=420key666`)
      .then(response => {
        // JSON responses are automatically parsed.
        this.artistList = response.data
      })
      .catch(e => {
        this.errors.push(e)
      })

    },
    methods:{
      addData(){
      //  console.log("added");
      },
      saveCookieTheme(){
        //TODO: to be fixed
        if(typeof(Storage) !== "undefined") {
           window.localStorage.setItem('themeColor', new Boolean(this.dark));
          // console.log("saved data");
        //   console.log(window.localStorage.getItem('themeColor'));
        }
      },
      updateList(){
        //console.log(this.selected);
        Axios.post(`/collabs/Routing/getSongList.php?safe_key=420key666`,this.selected)
        .then(response => {

          // JSON responses are automatically parsed.
          this.songList = response.data
        })
        .catch(e => {
          this.errors.push(e)
        })
      }

    }
  }
</script>

<style lang="stylus">
  @import './stylus/main'
</style>
<style >

 .menu__content{
   background-color:transparent;
 }
 .paddingTop{
   padding-top:20px;
 }
 .boldText{
   font-weight:700;
 }
 .bolderText{
   font-weight:800;
 }
 .customPadding{
   padding-top:5px;
   padding-bottom:5px;
 }
 footer{
   overflow:hidden;
 }
 *::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
}
*::-webkit-scrollbar
{
	width: 10px;
	background-color: #F5F5F5;
}

*::-webkit-scrollbar-thumb
{
	background-color: grey;
}
</style>
