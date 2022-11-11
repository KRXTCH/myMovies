import { Component, useState } from "react";
import { Link } from "react-router-dom";

class FilmList extends Component {
	constructor(props) {
		super(props);
	}

	render() {
		const { title, datas, dataLoaded } = this.props;

		if (dataLoaded) {
			var filmList = datas.map((data) => {
				return (
					<Link
						key={data.id}
						id={data.id}
						className="film"
						to={`/film/filmId=` + data.id.toString()}
						rel={data.title}
						style={{
							background: `url(https://image.tmdb.org/t/p/w200${data.poster_path})`,
						}}
					></Link>
				);
			});
		}

		return (
			<section id="film_list">
				<h4 className="light playlist_title">{title}</h4>
				<div className="scroll_container">
					<div className="film_container">
						{filmList ?? (
							<h1 className="error_text">
								Une érreur est survenue...
							</h1>
						)}
					</div>
				</div>
			</section>
		);
	}
}

export default FilmList;
