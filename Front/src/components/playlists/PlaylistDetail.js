import { Breadcrumbs } from "@mui/material";
import { Link } from "react-router-dom";
import FilmList from "../movies/FilmList";
import Playlist from "./Playlist";

function PlaylistDetail() {
  const json = {
    playlist: {
      playlist_id: 1,
      user_id: 3,
      creation_date: "2015-03-25",
      name: "Films flippants",
      isPublic: true,
      films: [
        {
          id: 663712,
          poster_path: "/wRKHUqYGrp3PO91mZVQ18xlwYzW.jpg",
        },
        {
          id: 675054,
          poster_path: "/85zufUxhD97k2s5Bu2u101Qd8Sg.jpg",
        },
        {
          id: 420634,
          poster_path: "/nfRlQCl590F30L37aihuqBGBvaO.jpg",
        },
      ],
    },
  };

  const isPublic = () => {
    if (json.playlist.isPublic) {
      return <p>Cette playlist est publique</p>;
    } else {
      return <p>Cette playlist est privée</p>;
    }
  };

  return (
    <section id="playlist_detail">
      <Breadcrumbs className="breadcrumb" aria-label="breadcrumb">
        <Link to="/">Accueil</Link>
        <p>{json.playlist.name}</p>
      </Breadcrumbs>
      <div className="playlist_informations">
        <Playlist posterPath={json.playlist.films[0].poster_path}></Playlist>
        <div className="playlist_identity">
          <h1>{json.playlist.name}</h1>
          <p>
            Créé le {json.playlist.creation_date} par {json.playlist.user_id}
          </p>
          {isPublic()}
        </div>
      </div>
      <div>
        <FilmList
          datas={json.playlist.films}
          dataLoaded={true}
          title="Films associés à cette playlist"
        ></FilmList>
      </div>
    </section>
  );
}

export default PlaylistDetail;