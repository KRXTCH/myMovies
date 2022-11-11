import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faFolderOpen } from "@fortawesome/free-solid-svg-icons";

function Playlist({posterPath}) {
    return (
        <div className="playlist_visual">
          <img width={200} height={300} alt="Image de playlist"
            src={`https://image.tmdb.org/t/p/w200${posterPath}`}
          ></img>
          <FontAwesomeIcon className="playlist_icon" icon={faFolderOpen} />
        </div>
    )
}

export default Playlist;