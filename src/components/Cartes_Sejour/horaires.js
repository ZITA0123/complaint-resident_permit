export default class PlageHoraire {
    constructor (horaire) {
      this.horaire = horaire
    }
  
    static getPlageHoraire () {
      let plage = [
          "09:00",
          "09:15",
          "09:30",
          "09:45",
          "10:00",
          "10:15",
          "10:30",
          "10:45",
          "11:00",
          "11:15",
          "11:30",
          "11:45",
          "12:00",
          "12:15",
          "12:30",
          "12:45",

      ]            
      return plage
    }
}